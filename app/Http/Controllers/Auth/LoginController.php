<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        if(auth()->check()){
            return redirect()->route('admin.home');
        }
        else
        {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'],'is_admin'=>1)))
        {
            return redirect()->route('admin.home');
        }else if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'],'is_admin'=>0))){
            return redirect('/forums');
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
        
    }
    public function logout()
    {
        $userData = auth()->user();
        // \LogActivity::addToLog('164',$userData);
        auth()->logout();
        Session::flush();
        return redirect()->to('login');
    }
}
