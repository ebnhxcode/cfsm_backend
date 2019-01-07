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

    public function productores()
    {
        return $this->hasMany('App\Productor', 'region_id');
    }

    
}
