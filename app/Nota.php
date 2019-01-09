<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table      = 'nota';
    protected $primaryKey = 'nota_id';
    protected $fillable = [
        'nota_nombre',
        'nota_descripcion',
    ];
    public $timestamps = false;


    #hasMany's

    public function lotes () {
        return $this->hasMany(Lote::class, 'nota_id');
    }

    public function muestras () {
        return $this->hasMany(Muestra::class, 'nota_id');
    }
    public function muestras_defectos () {
        return $this->hasMany(MuestraDefecto::class, 'nota_id');
    }
    public function tolerancias () {
        return $this->hasMany('App\Tolerancia', 'nota_id');
    }

    #belongsTo's


}
