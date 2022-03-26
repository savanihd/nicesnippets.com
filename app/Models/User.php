<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Cachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','avatar','is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUser()
    {
      return static::paginate(10);
    }

    public function addUser($input)
    {
      return static::create(Arr::only($this->fillable));
    }

    public function findUser($id)
    {
      return static::find($id);
    }

    public function updateUser($id, $input)
    {
        return static::where('id',$id)->update(Arr::only($input,$this->fillable));
    }

    public function destroyUser($id)
    {
        return static::where('id',$id)->delete();
    }
}
