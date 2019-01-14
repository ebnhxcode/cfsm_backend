<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apariencia extends Model
{
    //

    protected $table      = 'apariencia';
    protected $primaryKey = 'apariencia_id';
    protected $fillable = [
        'apariencia_nombre',
        'apariencia_descripcion'
    ];

    public $timestamps = false;
}
