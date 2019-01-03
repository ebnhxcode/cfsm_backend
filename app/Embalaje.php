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



    #belongsTo's
}
