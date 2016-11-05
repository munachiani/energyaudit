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
}
