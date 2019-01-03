<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    //

    protected $table      = 'concepto';
    protected $primaryKey = 'concepto_id';
    protected $fillable = [
        'concepto_nombre',
    ];
    public $timestamps = false;



    #hasMany's
    public function defectos () {
        return $this->hasMany(Defecto::class, 'concepto_id');
    }


    #belongsTo's
}
