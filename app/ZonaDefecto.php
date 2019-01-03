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
        return $this->hasMany(Defecto::class, 'id_zona'):
    }


    #belongsTo's
}
