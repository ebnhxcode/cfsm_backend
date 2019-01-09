<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tolerancia extends Model
{
    protected $table      = 'tolerancia';
    protected $primaryKey = 'tolerancia_id';
    protected $fillable = [
        'tolerancia_desde',
        'tolerancia_hasta',

        'defecto_id',
        'categoria_id',
        'nota_id',
    ];
    public $timestamps = false;

    #hasMany's



    #belongsTo's
    public function defecto () {
        return $this->belogsTo('App\Defecto', 'id_defecto');
    }
    public function categoria () {
        return $this->belogsTo('App\Categoria', 'id_categoria');
    }
    public function nota () {
        return $this->belogsTo('App\Nota', 'id_nota');
    }
}
