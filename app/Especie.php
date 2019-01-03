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



    #belongsTo's
}
