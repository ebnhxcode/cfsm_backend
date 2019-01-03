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


    public function especie () {
        return $this->belongsTo(Especie::class, 'especie_id');
    } 
}
