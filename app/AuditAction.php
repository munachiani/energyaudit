<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditAction extends Model
{

    public static $LOGIN=1;
    public static $LOGOUT=2;
    public static $CREATE_USER=3;
    public static $UPDATE_USER=4;
    public static $ACTIVATE_USER=5;
    public static $DEACTIVATE_USER=6;
    public static $ASSIGN_REGION=7;
    public static $ASSIGN_ROLE=8;
    public static $DELETE_USER_REGION=9;
    public static $REMOVE_USER_ROLE=10;
    public static $PASSWORD_RESET=11;


    protected $fillable=
        [
            'action_name',
            'action_detail'
        ];
}
