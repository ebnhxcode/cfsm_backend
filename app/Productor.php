<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    protected $table      = 'productor';
    protected $primaryKey = 'productor_id';
    protected $fillable = [
        'productor_nombre',
        'region_id',
    ];
    public $timestamps = false;

    /*Un productor tiene una region*/
    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id' );
    }
}
