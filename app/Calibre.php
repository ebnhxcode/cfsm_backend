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

    #belongsTo's
    public function especie () {
        return $this->belongsTo(Especie::class, 'id_especie');
    }
}
