<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'continent_id', 'code', 'isd_code', 'flag', 'flag_path', 'status',
    ];

    public function city(){

        return $this->hasMany('App\City');
    }
    public function continent(){

        return $this->belongsTo('App\Continent');
    }
}
