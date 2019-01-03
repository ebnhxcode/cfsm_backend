<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table      = 'comunas';
    protected $primaryKey = 'comuna_id';
    protected $fillable = [
        'comuna_nombre',


        'provincia_id',
    ];
    public $timestamps = false;



    #hasMany's



    #belongsTo's

    public function provincia () {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }
}
