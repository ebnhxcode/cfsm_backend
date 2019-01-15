<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuestraDefecto extends Model
{
    protected $table      = 'muestra_defecto';
    protected $primaryKey = 'muestra_defecto_id';
    protected $fillable = [
        'muestra_defecto_valor',
        'muestra_defecto_calculo',
        'muestra_id',
        'defecto_id',
        'nota_id',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
    public function muestra () {
        return $this->belongsTo('App\Muestra', 'muestra_id');
    }
    public function defecto () {
        return $this->belongsTo('App\Defecto', 'defecto_id');
    }
    public function nota () {
        return $this->belongsTo('App\Nota', 'nota_id');
    }
}
