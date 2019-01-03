<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tolerancia extends Model
{
    protected $table      = 'tolerancia';
    protected $primaryKey = 'tolerancia_id';
    protected $fillable = [
        'lote_codigo',
        'lote_cajas',

        'nota_id',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
}
