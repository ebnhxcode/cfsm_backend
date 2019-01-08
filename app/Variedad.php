<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    protected $table      = 'variedad';
    protected $primaryKey = 'variedad_id';
    protected $fillable = [
        'variedad_nombre',
        'varieda_codigo',
        'especie_id',
    ];
    public $timestamps = false;
    /*
        #hasMany's
        public function muestras () {
            return $this->hasMany(Muestra::class, 'variedad_id');
        }
    */
    #belongsTo's
    public function especie() {
        return $this->belongsTo('App\Especie', 'especie_id' );
    } 

}
