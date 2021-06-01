<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table="rol";
    protected $primaryKey="idrol";
     protected $fillable = [
        'nomrol', 'cve_rol',
    ];
    public $timestamps = false;
}
