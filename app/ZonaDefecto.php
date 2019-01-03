<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZonaDefecto extends Model
{
    protected $table      = 'lote';
    protected $primaryKey = 'lote_id';
    protected $fillable = [
        'lote_codigo',
        'lote_cajas',

        'nota_id',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
}
