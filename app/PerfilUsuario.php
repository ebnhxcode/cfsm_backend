<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PerfilUsuario extends Model
{
    protected $table = "perfil_usuario";
    protected $primaryKey = "perfil_id";

    protected $fillable = [
        'perfil_nombre',
        'perfil_detalle',
        'perfil_estado',
    ];


    public function user () {
        return $this->hasMany(User::class, 'perfil_id');
    }
    


}
