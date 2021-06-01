<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
	protected $table='libro';
    protected $primaryKey='id_libro';

    

    protected $fillable = [
        'nom_libro', 'editorial', 'id_autor', 'review', 'foto',
    ];
}
