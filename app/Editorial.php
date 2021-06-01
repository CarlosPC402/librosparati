<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $table='editorial';

    protected $primaryKey='id_editorial';

    public $timestamps=false;

    protected $fillable = [
        'id_editorial', 'nom_editorial',
    ];
}

