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

    public function getFullNameAttribute()
    {
        return $this->LastName . ' ' . $this->FirstName;
    }

    public function userRegion(){
        return $this->hasMany('\App\UserRegion','user_id');
    }

    public function userRole(){
        return $this->hasMany('\App\UserRole','userId');
    }

    public function ScopeLatestRole(){
        return $this->userRole()->latest('id')->first();
    }

    public function role(){
//        return $this->ScopeLatestRole()
    }

    public function region(){
        return $this->hasManyThrough('\App\Region','\App\UserRegion','user_id','id');
    }



}
