<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'gender', 'birth_date', 'birth_place', 'address', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $updateRules = [
        'name' => 'max:191|required',
        'email' => 'max:191',
        'birth_place' => 'max:191',
        'address' => 'max:191',
        'phone' => 'max:191'
    ];

    public $updatePasswordRules = [
        'oldpassword' => 'max:191|required',
        'newpassword1' => 'max:191|min:8|required'
    ];
}
