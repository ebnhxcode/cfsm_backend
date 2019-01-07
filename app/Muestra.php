<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    protected $table      = 'muestra';
    protected $primaryKey = 'muestra_id';
    protected $fillable = [
        'muestra_fecha',
        'muestra_qr',
        'muestra_imagen',
        'muestra_cajas',
        'lote_codigo',
        'productor_id',
        'especie_id',
        'variedad_id',
        'calibre_id',
        'embalaje_id',
        'etiqueta_id',
        'nota_id',
        'estado_muestra_id',
        'lote_id',
    
    ];
    public $timestamps = false;

    #hasMany's
    public function muestras_defectos () {
        return $this->hasMany(MuestraDefecto::class, 'muestra_id');
    }
    public function variedades () {
        return $this->hasMany(Variedad::class, 'muestra_id');
    }

    #belongsTo's
    public function productor () {
        return $this->belongsTo(Productor::class, 'productor_id');
    }

    public function especie () {
        return $this->belongsTo(Especie::class, 'especie_id');
    }

    public function variedad () {
        return $this->belongsTo(Variedad::class, 'variedad_id');
    }

    public function calibre () {
        return $this->belongsTo(Calibre::class, 'calibre_id');
    }

    public function embalaje () {
        return $this->belongsTo(Embalaje::class, 'embalaje_id');
    }

    public function etiqueta () {
        return $this->belongsTo(Etiqueta::class, 'etiqueta_id');
    }

    public function nota () {
        return $this->belongsTo(Nota::class, 'nota_id');
    }

    public function estado_muestra () {
        return $this->belongsTo(EstadoMuestra::class, 'estado_muestra_id');
    }

    public function lote () {
        return $this->belongsTo(Lote::class, 'lote_id');
    }

}
