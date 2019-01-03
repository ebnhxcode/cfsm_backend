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
    public function tolerancias () {
        return $this->hasMany(Tolerancia::class, 'categoria_id');
    }


    #belongsTo's
    
}
