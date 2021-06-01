<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $primaryKey='idusuario';

    public $timestamps=false;

    protected $fillable = [
        'nombre', 'apellido_p', 'apellido_m', 'idrol', 'email', 'password', 'foto',
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
}
