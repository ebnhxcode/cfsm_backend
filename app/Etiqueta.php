<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $table      = 'etiqueta';
    protected $primaryKey = 'etiqueta_id';
    protected $fillable = [
        'etiqueta_nombre',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
}
