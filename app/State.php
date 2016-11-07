<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable=['name'];

    public function ScopeByName($query, $name){

        return $query->where('name', '=', $name)->first();

    }
}
