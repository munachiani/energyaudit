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
}
