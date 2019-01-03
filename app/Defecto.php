<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defecto extends Model
{
    protected $table      = 'defecto';
    protected $primaryKey = 'defecto_id';
    protected $fillable = [
        'defecto_nombre',

        'zona_id',
        'concepto_id',
    ];
    public $timestamps = false;



    #hasMany's
    public function muestras_defectos () {
        return $this->hasMany(MuestraDefecto::class, 'defecto_id');
    }
    public function tolerancias () {
        return $this->hasMany(Tolerancia::class, 'defecto_id');
    }


    #belongsTo's
    public concepto () {
        return $this->belongsTo(Concepto::class, 'concepto_id');
    }

    public zona_defecto () {
        return $this->belongsTo(ZonaDefecto::class, 'zona_id');
    }
}
