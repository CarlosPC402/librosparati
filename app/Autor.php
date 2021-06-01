<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
	protected $table='autor';

    protected $primaryKey='id_autor';

    public $timestamps=false;

    protected $fillable = [
        'id_autor', 'nombre', 'apellidos',
    ];
}
