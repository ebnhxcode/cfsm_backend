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



    #belongsTo's
    public function productor () {
        return $this->belongsTo(Productor::class, 'id_productor');
    }

    public function especie () {
        return $this->belongsTo(Especie::class, 'id_especie');
    }

    public function variedad () {
        return $this->belongsTo(Variedad::class, 'id_variedad');
    }

    public function calibre () {
        return $this->belongsTo(Calibre::class, 'id_calibre');
    }

    public function embalaje () {
        return $this->belongsTo(Embalaje::class, 'id_embalaje');
    }

    public function etiqueta () {
        return $this->belongsTo(Etiqueta::class, 'id_etiqueta');
    }

    public function nota () {
        return $this->belongsTo(Nota::class, 'id_nota');
    }

    public function estado_muestra () {
        return $this->belongsTo(EstadoMuestra::class, 'estado_muestra_id');
    }

    public function lote () {
        return $this->belongsTo(Lote::class, 'lote_id');
    }

}
