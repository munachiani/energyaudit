<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegion extends Model
{
    protected $fillable = [
        'user_id',
        'region_id',
    ];

    public function ScopeByName($query, $name){

        return $query->where('region_name', '=', $name)->first();

    }

    public function user(){
        return $this->belongsTo('\App\User','user_id');
    }

    public function region(){
        return $this->belongsTo('\App\Region','region_id');
    }
}
