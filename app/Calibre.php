<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calibre extends Model
{
    protected $table      = 'calibre';
    protected $primaryKey = 'calibre_id';
    protected $fillable = [
        'calibre_nombre',
        'especie_id'
    ];

    public $timestamps = false;

    #hasMany's
    public function muestras () {
        return $this->hasMany(Muestra::class, 'calibre_id');
    }

    #belongsTo's
    public function especie () {
        return $this->belongsTo('App\Especie', 'especie_id');
    }
}
