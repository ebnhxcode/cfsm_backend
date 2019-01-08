<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table      = 'especie';
    protected $primaryKey = 'especie_id';
    protected $fillable = [
        'especie_nombre',
    ];
    public $timestamps = false;


    #hasMany's
    public function variedades () {
        return $this->hasMany('App\Productor', 'region_id');
    }
    public function calibres () {
        return $this->hasMany('App\Calibre', 'especie_id');
    }
    public function muestras () {
        return $this->hasMany(Muestra::class, 'especie_id');
    }
    #belongsTo's
}
