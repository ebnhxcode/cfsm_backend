<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table      = 'regiones';
    protected $primaryKey = 'region_id';
    protected $fillable = [
        'region_nombre',
        'region_ordinal',
    ];
    public $timestamps = false;

    #hasMany's
    public function productores()
    {
        return $this->hasMany(Productor::class, 'region_id');
    }
    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'region_id');
    }

    /*
    public function ToListaCarta(){
        return $this->hasMany('App\Lista', 'CRT_ID');
    }
    */

    #belongsTo's
}
