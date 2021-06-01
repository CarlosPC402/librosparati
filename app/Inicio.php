<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inicio extends Model
{
    protected $table='libro';
    protected $primaryKey='id_libro';

    public $timestamps=false;

    protected $fillable = [
        'nom_libro', 'editorial', 'id_autor', 'review', 'foto',
    ];
}
}
