<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuario";
    protected $primaryKey="idusuario";
    protected $fillable = [
        'nombre', 'apellido_p', 'apellido_m', 'email', 'password', 'idrol', 'foto',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public $timestamps = false;
}
