<?php

namespace App;
/*
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
*/
//class User extends Authenticatable
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
//    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'competencias','name','cpf','phone', 'email', 'user','pass'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
/*    protected $hidden = [
        'password', 'remember_token',
    ];*/

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
/*    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
}
