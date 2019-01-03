<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoMuestra extends Model
{
    protected $table      = 'estado_muestra';
    protected $primaryKey = 'estado_muestra_id';
    protected $fillable = [
        'estado_muestra_nombre',
        'estado_muestra_terminado',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
}
