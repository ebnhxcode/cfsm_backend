<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table      = 'grupo';
    protected $primaryKey = 'grupo_id';
    protected $fillable = [
        'grupo_nombre',
        'grupo_descripcion',
    ];
    public $timestamps = false;

   

}
