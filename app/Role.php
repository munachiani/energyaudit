<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['name'];

    public static $DISCO = 'Disco';
    public static $FIELD_AGENT = 'Field Agent';
    public static $GENERAL_SUPERVISOR = 'General Supervisor';
    public static $REGIONAL_ADMIN = 'Regional Admin';
    public static $REGIONAL_SUPERVISOR = 'Regional Supervisor';
    public static $SUPER_ADMIN = 'Super Admin';


    public function ScopeByName($query, $name){

               return $query->where('name', '=', $name)->first();

    }
}
