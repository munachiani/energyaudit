<?php

namespace App\Http\Controllers;

use App\Region;
use App\User;
use Illuminate\Http\Request;
use App\AuditAction;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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

    public function editUsers($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')
            ->with(compact('user'));
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

    public function ManageRole($id)
    {
//        dd($id);

        $user = User::find($id);
        return view('admin.users.manageRole')
            ->with(compact('user'));
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function ChangeAvatar(Request $request)
    {

        $rules = [
            'ImageInfo' => 'required|mimes:jpeg,jpg,png'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {

            $user = User::find($request['id']);
//            $user = User::find($request['id']);


            $userName = $user->getFullNameAttribute();

            $file = $request->file('ImageInfo');


            if ($file->isFile()) {
                $destinationPath = public_path('userimages/');
                $extension = $file->getClientOriginalExtension();
                $name = explode(' ', $userName);
                $name = implode('', $name);

                $filename = $name . '.' . $extension;

                if ($file->move($destinationPath, $filename)) {
                    $user->ImageInfo = $filename;

                }
            }

            $user->save();
            if (!empty(AuditAction::$UPDATE_USER)) {
                $this->auditTrail($user, AuditAction::$UPDATE_USER, array('{UserName}'), array($user->UserName));
            }
            session()->flash('flash_message', 'Avatar Updated.');
            return redirect()->back();
        }

    }

    public function updateProfile(Request $request, $id)
    {

        $rules = [
            'FirstName' => 'required',
            'LastName' => 'required',
            'MiddleName' => 'required',
//            'Email' => 'required|unique:users',
            'Address' => 'required',
            'PhoneNumber' => 'required',
            'UserRoles' => 'required',
            'Gender' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {

            $firstName = $request['FirstName'];
            $lastName = $request['LastName'];
            $middleName = $request['MiddleName'];
            $email = $request['Email'];
            $address = $request['Address'];
            $PhoneNumber = $request['PhoneNumber'];

            $user = User::find($id);

            $user->FirstName = $firstName;
            $user->LastName = $lastName;
            $user->MiddleName = $middleName;
            $user->email = $email;
            $user->Address = $address;
            $user->PhoneNumber = $PhoneNumber;

            session()->flash('flashMessage', 'User Updated');

            $user->save();
            return redirect()->back();

        }
    }


}
