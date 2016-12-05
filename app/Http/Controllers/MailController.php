<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

class MailController extends Controller
{
    public $to = '';
    public $from = '';
    public $name = '';
    public $fromname = '';
    public $subject = '';
    public $text = '';


    public function basic_email()
    {
        $data = array('name' => "MDAdebts APTOVP");

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to('hexxondiv@gmail.com', 'MDAdebts APTOVP')->subject
            ('Basic Testing Mail');
            $message->from('mdadebts@gmail.com', 'MDAdebts APTOVP');
        });
        echo "Basic Email Sent. Check your inbox.";
    }

    public function html_email(Request $request)
    {
        $this->to = (!is_null($request['to']) ? $request['to'] : 'hexxondiv@gmail.com');
        $this->from = (!is_null($request['from']) ? $request['from'] : 'mdadebts@gmail.com');
        $this->name = (!is_null($request['name']) ? $request['name'] : 'MDAdebts APTOVP');
        $this->subject = (!is_null($request['subject']) ? $request['subject'] : 'HTML Testing Mail');
        $this->text = (!is_null($request['text']) ? $request['text'] : 'Checking Text Sending.');
        $this->fromname = (!is_null($request['namefrom']) ? $request['namefrom'] : 'MDAdebts APTOVP');

        $data = array('name' => $this->name,'text' => $this->text);
        Mail::send('mail', $data, function ($message) {
            $message->to($this->to, $this->fromname)->subject
            ($this->subject);
            $message->from($this->from, $this->fromname);
        });
        echo "HTML Email Sent. Check your inbox.";
    }

    public function reset_email(Request $request)
    {
        $this->to = (!is_null($request['to']) ? $request['to'] : 'hexxondiv@gmail.com');
        $this->from = (!is_null($request['from']) ? $request['from'] : 'mdadebts@gmail.com');
        $this->name = (!is_null($request['name']) ? $request['name'] : 'MDAdebts APTOVP');
        $this->subject = (!is_null($request['subject']) ? $request['subject'] : 'HTML Testing Mail');
        $this->text = (!is_null($request['text']) ? $request['text'] : 'Checking Text Sending.');
        $this->fromname = (!is_null($request['namefrom']) ? $request['namefrom'] : 'MDAdebts APTOVP');

        $data = array('name' => $this->name,'text' => $this->text,'subject'=>$this->subject);
        Mail::send('mail', $data, function ($message) {
            $message->to($this->to, $this->name)->subject
            ($this->subject);
            $message->from($this->from, $this->fromname);
        });
        return redirect()->to('/')
            ->withErrors(['success' => 'Password Reset Successful. Please check your mail for the new password.']);
    }

    public function attachment_email()
    {
        $data = array('name' => "MDAdebts APTOVP");
        Mail::send('mail', $data, function ($message) {
            $message->to('hexxondiv@gmail.com', 'MDAdebts APTOVP')->subject
            ('Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('mdadebts@gmail.com', 'MDAdebts APTOVP');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
