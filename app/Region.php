<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'region_name',
        'region_key',
        'state_id',
    ];

    public function ScopeInState($query,$id){
        return $query->where('state_id','=',$id)->get();
    }

    public function userRegion(){
        return $this->hasMany('\App\Region','region_id');
    }

    public function state(){
        return $this->belongsTo('\App\State','state_id');
    }
}
