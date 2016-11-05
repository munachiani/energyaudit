<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'LastName',
        'FirstName',
        'MiddleName',
        'UserName',
        'Gender',
        'Address',
        'PhoneNumber',
        'Email',
        'EmailConfirmed',
        'password',
        'PhoneNumberConfirmed',
        'TwoFactorEnabled',
        'LockoutEndDateUtc',
        'LockoutEnabled',
        'AccessFailedCount',
        'IsActive',
        'created_by',
        'Latitude',
        'Longitude',
        'ImageInfo',
        'disco_id',
    ];

    public  static $AccessFailedCountLimit=3;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isActive(){
        return $this->IsActive?true:false;
    }
    public function lockoutEnabled(){
        return $this->LockoutEnabled?true:false;
    }


}
