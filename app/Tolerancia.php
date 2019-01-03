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
        return $this->belogsTo(Defecto::class, 'id_defecto');
    }
    public function categoria () {
        return $this->belogsTo(Categoria::class, 'id_categoria');
    }
    public function nota () {
        return $this->belogsTo(Nota::class, 'id_nota');
    }
}
