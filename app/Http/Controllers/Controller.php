<?php

namespace App\Http\Controllers;

use App\AuditAction;
use App\AuditTrail;
use App\Role;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ]);
        if ($user->save())
            return true;
        return false;
    }


    public function newPassword($lim = 8)
    {
        while (true) //Loop forever
        {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
//            $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < $lim; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $id = implode($pass); //turn the array into a string and return as pwd
            return $id;
        }
    }

    public function dataExistsInTable($strData, $field, $tb)
    {
        $checkQuery = '';
        switch ($tb) {
            case 'users':
                $checkQuery = User::whereRaw($field . '=?', [$strData])->get();
                break;
        }
        return $checkQuery->count() > 0;
    }

    public function checkNull($str)
    {
        if (strpos($str, 'undefined') <= 0 && strpos($str, 'NULL') <= 0 && strpos($str, 'nil') <= 0 && strpos($str, 'Nil') <= 0)
            return $str;
        return "&nbsp;";
    }


    //general mail sender header
    public function mailer_head($subject)
    {
        $mail_head = "<html>
		<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<title>" . $subject . "</title>
		</head>
		<body style=\"padding:0; margin:0; background:url('" . url('imgs/mailerBg.png') . "') repeat-y\">
<div>
    <div>
    <img src=\"" . url('imgs/mailerTop.png') . " \"/>
    </div>
    <div style=\"min-height:500px; padding:10px; width:680px \">";

        return $mail_head;

    }

    //general mail sender footer
    public function mailer_footer($name = "MDAUDIT", $office = "http://mdadebts.aptovp.org/")
    {
        $mail_footer = "
		<br><br/>
		Best Regards,<br><br>
		" . $name . ",<br>
		" . $office . "
		</div>

		<div>
		<img src=\"" . url('imgs/mailerBottom.png') . " \" />
		</div>
		</div>
		</body>
		</html>";

        return $mail_footer;

    }


    //general headerset for sending mail
    public function headerSet($bcc = '', $mailer = 'MDAUDIT<info@aptovp.org>')
    {
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8'" . "\r\n";
        $headers .= "Return-Path: $mailer \r\n";
        // More headers
        $headers .= 'From: ' . $mailer . "\r\n";
        if ($bcc != '')
            $headers .= 'Bcc: ' . $bcc . "\r\n";

        return $headers;

    }

    //This function generally sends mail... any time
    public function send_this_message($to, $subject, $txt, $mailer = 'MDAUDIT<info@aptovp.org>', $name = "MDAUDIT", $office = "http://mdadebts.aptovp.org", $bcc = '')
    {

        $message = $this->mailer_head($subject);
        $message .= stripcslashes($txt);
        $message .= $this->mailer_footer($name, $office);
        $headers = $this->headerSet($bcc, $mailer);
        $success = mail($to, $subject, $message, $headers);

        return $success;
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

}
