<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table      = 'categoria';
    protected $primaryKey = 'categoria_id';
    protected $fillable = [
        'categoria_nombre',
    ];
    public $timestamps = false;


    #hasMany's



    #belongsTo's
    
}
