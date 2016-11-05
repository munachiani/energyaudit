<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct()
    {
          /*  $user=auth()->user();
            if(is_null($user))
                return redirect('/')
                    ->withErrors(['loginError'=>'Please login to access the dashboard']);*/
        $this->middleware('auth');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function viewUsers()
    {
        return view('admin.users.index');
    }

    public function editUsers()
    {
        return view('admin.users.edit');
    }

    public function activateUsers()
    {
        return view('admin.users.activate');
    }

    public function createUsers()
    {
        return view('admin.users.create');
    }

    public function saveUsers()
    {
        $data = Input::all();
        dd($data);

    }

    public function reportInfo()
    {
        return view('admin.report');
    }

    public function customerData()
    {
        return view('admin.customer.data');
    }

    public function customerBilling()
    {
        return view('admin.customer.billing');
    }

    public function map()
    {
        return view('admin.map');
    }

    public function audit()
    {
        return view('admin.audit');
    }

    public function changePassword()
    {
        return view('admin.users.password');
    }
    public  function ManageRole(){
        return view('admin.users.manageRole');
    }


}
