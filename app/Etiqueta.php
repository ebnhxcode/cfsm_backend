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
    public function muestras () {
        return $this->hasMany('App\Muestra', 'etiqueta_id');
    }


    #belongsTo's
}
