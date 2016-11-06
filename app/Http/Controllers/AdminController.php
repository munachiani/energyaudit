<?php

namespace App\Http\Controllers;

use App\Region;
use App\Role;
use App\User;
use App\UserDisco;
use App\UserRegion;
use App\UserRole;
use Illuminate\Http\Request;
use App\AuditAction;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Excel;

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

    public function uploadMDAEnergyAuditData()
    {
        return view('admin.upload');
    }

    public function saveMDAEnergyAuditData(Request $request)
    {

        $file = $request->file('file');
        if ($file->isFile()) {
            $destinationPath = public_path('tempUploads/');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'xls' && $extension != 'xlsx')
                return redirect()->back()->withErrors(['uploadError' => 'Invalid File Format']);

            $filename = 'mda_' . '.' . $extension;

            if ($file->move($destinationPath, $filename)) {
                session()->flash('flash_message', 'Data Uploaded.');
                return redirect()->back();

            }
        }
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

            $this->auditTrail($user, AuditAction::$UPDATE_USER, array('{UserName}'), array($user->UserName));
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


    public function createUser(Request $request)
    {
        $rules = [
            'LastName' => 'required',
            'FirstName' => 'required',
            'MiddleName' => 'required',
            'Gender' => 'required',
            'PhoneNumber' => 'required',
            'Email' => 'required|string|unique:users',
            'Address' => 'required',
            'UserRole' => 'required',
            'password' => 'required|max:14|min:6',
            'confirmPassword' => 'required|same:password|max:14|min:6',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
            $LastName = $request['LastName'];
            $FirstName = $request['FirstName'];
            $MiddleName = $request['MiddleName'];
            $Gender = $request['Gender'];
            $address = $request['Address'];
            $PhoneNumber = $request['PhoneNumber'];
            $Email = $request['Email'];
            $UserRole = $request['UserRole'];
            $password = $request['password'];

            $user = new User();
            $user->LastName = $LastName;
            $user->FirstName = $FirstName;
            $user->MiddleName = $MiddleName;
            $user->Gender = $Gender;
            $user->Email = $Email;
            $user->PhoneNumber = $PhoneNumber;
            $user->Address = $address;
            $user->UserName = $Email;
            $user->IsActive = 1;
            $user->password = bcrypt($password);

            $user->save();

            $user_role = new UserRole();
            $user_role->userId = $user->id;
            $user_role->roleId = Role::byName($UserRole)->id;
            $user_role->save();


            switch ($UserRole) {
                case Role::$DISCO:

                    $disco = new UserDisco();

                    $disco->user_id = $user->id;
                    $disco->disco_id = $request['disco_id'];

                    $disco->save();

                    break;
                case Role::$FIELD_AGENT:
                case Role::$REGIONAL_ADMIN:
                case Role::$REGIONAL_SUPERVISOR:

                    $region = new UserRegion();

                    $region->user_id = $user->id;
                    $region->region_id = $request['Region'];

                    $region->save();

                    break;

            }

            session()->flash('flash_message', 'User created succesfully.');
            return redirect()->back();


        }
    }


}
