<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZonaDefecto extends Model
{
    protected $table      = 'zona_defecto';
    protected $primaryKey = 'zona_id';
    protected $fillable = [
        'zona_nombre',
        'zona_descripcion',

        'nota_id',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
}
