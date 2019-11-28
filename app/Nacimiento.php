<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacimiento extends Model
{
    protected $fillable=[
        'libro','folio','n_partida','fecha_r','fecha_n',
        'apellidos','nombres','anexo','acta'
    ];
    public $timestamps = false;
}
