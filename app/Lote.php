<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table      = 'lote';
    protected $primaryKey = 'lote_id';
    protected $fillable = [
        'lote_codigo',
        'lote_cajas',
        'nota_id',
        'categoria_id',
    ];
    public $timestamps = false;

    #hasMany's
    public function muestras () {
        return $this->hasMany(Muestra::class, 'lote_id');
    }


    #belongsTo's
    public function nota () {
        return $this->belongsTo(Nota::class, 'nota_id');
    }
}
