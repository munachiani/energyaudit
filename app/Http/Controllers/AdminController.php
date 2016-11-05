<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //

    public function showLogin(){
        return view('admin.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function viewUsers(){
        return view('admin.users.index');
    }
    public function editUsers(){
        return view('admin.users.edit');
    }

    public function activateUsers(){
        return view('admin.users.activate');
    }

    public function createUsers(){
        return view('admin.users.create');
    }

    public function reportInfo(){
        return view('admin.report');
    }

    public function customerData(){
        return view('admin.customer.data');
    }
    public function customerBilling(){
        return view('admin.customer.billing');
    }
    public function map(){
        return view('admin.map');
    }
    public function audit(){
        return view('admin.audit');
    }

    public function changePassword(){
        return view('admin.users.password');
    }
    public  function ManageRole(){
        return view('admin.users.manageRole');
    }

}
