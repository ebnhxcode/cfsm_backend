<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table      = 'nota';
    protected $primaryKey = 'nota_id';
    protected $fillable = [
        'nota_nombre',
        'nota_descripcion',
    ];
    public $timestamps = false;


    #hasMany's



    #belongsTo's

    
}
