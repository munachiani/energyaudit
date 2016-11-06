<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'userId',
        'roleId'
    ];

    public function user(){
        return $this->belongsTo('\App\User','userId');
    }

    public function role(){
        return $this->belongsTo('\App\Role','roleId');
    }


}
