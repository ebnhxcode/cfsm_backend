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
        'muestra_peso',
        'apariencia_id',

    ];
    public $timestamps = false;

    #hasMany's
    public function muestras_defectos () {
        return $this->hasMany('App\MuestraDefecto', 'muestra_id');
    }

    #belongsTo's
    public function productor () {
        return $this->belongsTo('App\Productor', 'productor_id');
    }

    public function especie () {
        return $this->belongsTo('App\Especie', 'especie_id');
    }

    public function variedad () {
        return $this->belongsTo('App\Variedad', 'variedad_id');
    }

    public function calibre () {
        return $this->belongsTo('App\Calibre', 'calibre_id');
    }

    public function embalaje () {
        return $this->belongsTo('App\Embalaje', 'embalaje_id');
    }

    public function etiqueta () {
        return $this->belongsTo('App\Etiqueta', 'etiqueta_id');
    }

    public function nota () {
        return $this->belongsTo('App\Nota', 'nota_id');
    }

    public function estado_muestra () {
        return $this->belongsTo('App\EstadoMuestra', 'estado_muestra_id');
    }

    public function lote () {
        return $this->belongsTo('App\Lote', 'lote_id');
    }

    public function region() {
        return $this->belongsTo('App\Region', 'region_id');
    }

    public function categoria() {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

    public function apariencia () {
        return $this->belongsTo('App\Apariencia', 'apariencia_id');
    }

}
