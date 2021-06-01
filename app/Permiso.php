<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table="permiso";
    protected $primaryKey="idpermiso";
     protected $fillable = [
        'nompermiso', 'cve_permiso',
    ];
    public $timestamps = false;
}
