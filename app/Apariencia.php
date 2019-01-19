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
        'apariencia_descripcion',
        'nota_id',
    ];

    public $timestamps = false;

    public function muestras () {
        return $this->hasMany('App\Muestra', 'apariencia_id');
    }

}
