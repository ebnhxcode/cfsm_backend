<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZonaDefecto extends Model
{
    protected $table      = 'zona_defecto';
    protected $primaryKey = 'zona_id';
    protected $fillable = [
        'zona_nombre',
        'zona_descripcion',
    ];
    public $timestamps = false;

    #hasMany's
    public function defectos () {
        return $this->hasMany('App\Defecto', 'defecto_id');
    }


    #belongsTo's
}
