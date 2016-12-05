<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscoState extends Model
{
    protected $fillable = [
        'disco_id',
        'state_id',
    ];

    public function ScopeInDisco($query, $id){

        return $query->where('disco_id', '=', $id)->get();

    }
}
