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
    #belongsTo's
    public function zona () {
        return $this->belongsTo(ZonaDefecto::class, 'id_zona');
    }

    public function concepto () {
        return $this->belongsTo(Concepto::class, 'id_concepto');
    }
}
