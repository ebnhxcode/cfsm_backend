<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embalaje extends Model
{
    protected $table      = 'embalaje';
    protected $primaryKey = 'embalaje_id';
    protected $fillable = [
        'embalaje_nombre',
    ];
    public $timestamps = false;



    #hasMany's
    public function muestras () {
        return $this->hasMany(Muestra::class, 'embalaje_id');
    }


    #belongsTo's

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

    

}
