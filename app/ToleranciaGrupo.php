<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToleranciaGrupo extends Model
{
    protected $table      = 'tolerancia_grupo';
    protected $primaryKey = 'tolerancia_grupo_id';
    protected $fillable = [
        'grupo_id',
        'categoria_id',
        'nota_id',
        'tolerancia_grupo_desde',
        'tolerancia_grupo_hasta',
    ];
    public $timestamps = false;
}
