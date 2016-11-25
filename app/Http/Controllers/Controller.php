<?php

namespace App\Http\Controllers;

use App\AuditAction;
use App\AuditTrail;
use App\Role;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function auditTrail($user, $actionId, $find = '', $replace = '')
    {

        $audAction = AuditAction::find($actionId);
        $audTrail = new AuditTrail();
        $audTrail->actionId = $actionId;
        $audTrail->ipAddress = $_SERVER['REMOTE_ADDR'];
        $audTrail->actorName = $user->fullName;
        $audTrail->actorUsername = $user->UserName;
        $details = $audAction->action_detail;

        if (is_array($find) && is_array($replace)) {
            foreach ($find as $i => $item) {
                $details = str_replace($item, $replace[$i], $details);
            }
        }

        $audTrail->details = $details;

        $audTrail->userRole = Role::find($user->latestRole()->roleId)->name;

        if (!empty($user->region))
            foreach ($user->region as $item) {
                $audTrail->stateId = $item->state_id;
            }
        return $audTrail->save();

    }

    public function checkNull($str)
    {
        if (strpos($str, 'undefined') <= 0 && strpos($str, 'NULL') <= 0 && strpos($str, 'nil') <= 0 && strpos($str, 'Nil') <= 0)
            return $str;
        return "&nbsp;";
    }

}
