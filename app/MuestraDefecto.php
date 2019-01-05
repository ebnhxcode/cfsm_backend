<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuestraDefecto extends Model
{
    protected $table      = 'muestra_defecto';
    protected $primaryKey = 'muestra_defecto_id';
    protected $fillable = [
        'muestra_defecto_valor',
        'muestra_id',
        'defecto_id',
        'nota_id',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
    public function muestra () {
        return $this->belongsTo(Muestra::class, 'id_muestra');
    }
    public function defecto () {
        return $this->belongsTo(Defecto::class, 'id_defecto');
    }
    public function nota () {
        return $this->belongsTo(Nota::class, 'id_nota');
    }
}
