<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Tolerancia extends Model
{
    protected $table      = 'tolerancia';
    protected $primaryKey = 'tolerancia_id';
    protected $fillable = [
        'tolerancia_desde',
        'tolerancia_hasta',
        'defecto_id',
        'categoria_id',
        'nota_id',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
    public function defecto () {
        return $this->belongsTo('App\Defecto', 'defecto_id');
    }
    public function categoria () {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }
    public function nota () {
        return $this->belongsTo('App\Nota', 'nota_id');
    }
}
