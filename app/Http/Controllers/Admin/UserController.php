<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\User;
use Validator;
use App\Models\ImageUpload;

class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->user = new User;
    }

    public function index(Request $request)
    {
        $data = $this->user->getUser($request->all());
        return view('admin.users.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:password_confirmation',
            'password_confirmation'=>'required',
            'avatar'=>'required',
            'is_admin'=>'required',
        ]);

        if ($validator->passes()) {

            if($request->hasFile('avatar')){
                $input['avatar'] = ImageUpload::upload('/upload/user',$request->file('avatar'));
            }

            $input['password'] = bcrypt($input['password']);

            $this->user->addUser($input);

            notificationMsg('success',$this->crudMessage('add','user'));

            return redirect(route('users.index'));
        }

        return redirect()->route('users.create')
                ->withInput()
                ->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->findUser($id);

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findUser($id);

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'same:password_confirmation',
            'is_admin'=>'required',
        ]);

        if ($validator->passes()){
            if($request->hasFile('avatar')){
                $find = $this->user->findUser($id);

                if(!empty($find->avatar)){
                    ImageUpload::removeFile('/upload/user/'.$find->avatar);
                }
                $input['avatar'] = ImageUpload::upload('/upload/user',$request->file('avatar'));
            }else{
                $input = array_except($input,['avatar']);  
            }

            if(!empty($input['password'])){ 
                $input['password'] = bcrypt($input['password']);
            }else{
                $input = array_except($input,array('password'));    
            }

            $this->user->updateUser($id ,$input);

            notificationMsg('success',$this->crudMessage('update','user'));

            return redirect(route('users.index'));
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->destroyUser($id);

        notificationMsg('success',$this->crudMessage('delete','user'));
        return redirect()->route('users.index');
    }
}
