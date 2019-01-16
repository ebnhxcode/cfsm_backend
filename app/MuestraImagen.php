<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuestraImagen extends Model
{
    protected $table      = 'muestra_imagen';
    protected $primaryKey = 'muestra_imagen_id';
    protected $fillable = [
        'muestra_imagen_ruta',
        'muestra_imagen_fecha',
        'muestra_id',
        'muestra_imagen_texto',
        'muestra_imagen_ruta_corta',
    ];
    public $timestamps = false;
}
