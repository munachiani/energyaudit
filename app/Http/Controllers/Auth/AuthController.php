<?php

namespace App\Http\Controllers\Auth;

use App\AuditAction;
use App\Region;
use App\Role;
use App\User;
use App\UserDisco;
use App\UserRegion;
use App\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'UserName' => 'required|email|unique:users',
            'password' => 'required|max:14|min:6',
            'passwordConfirm' => 'required|same:password|max:14|min:6',
            'FirstName' => 'required|string|max:15',
            'LastName' => 'required|string|max:15',
            'MiddleName' => 'required|string|max:15',
            'Gender' => 'required|string|max:1',
            'Address' => 'required|string',
            'PhoneNumber' => 'required|string|unique:users',
            'PhoneNumberConfirm' => 'required|string|same:PhoneNumber',
            'Email' => 'required|string|unique:users',
            'EmailConfirm' => 'required|string|same:Email',
        ]);
    }

    /**
     * Handle an authentication attempt.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        $userData = array(
            'UserName' => $request->UserName,
            'password' => $request->password
        );

        //search for the user first
        $user = User::where('UserName', '=', $request->UserName)->first();
        //dd($user);
        if ($user != null) {
            if ($user->EmailConfirmed == 0) {
                return redirect()->back()
                    ->withErrors(["loginError" => 'Your Account has not been confirmed. Please check your inbox/spam messages ' . $user->Email . ' to find confirmation link ']);
            } elseif ($user->IsActive == 0) {
                return redirect()->back()
                    ->withErrors(["loginError" => "Your Account is deactivated. Please contact admin for details/Reactivation"]);
            }elseif ($user->LockoutEnabled == 1) {
                return redirect()->back()
                    ->withErrors(["loginError" => "You have been locked out due to many failed login attempts. Please contact admin for details/Reactivation"]);
            }
            /*else if ($user->TwoFactorEnabled == 1) {
                return Auth::attempt($userData) ? redirect()->back() : redirect()->back()
                    ->withErrors(["loginError" => "Unable to login"]);
            }*/
            else {
                if (Auth::attempt($userData)) {
//                    $this->auditTrail($user,AuditAction::$LOGIN);
                    $user->LockoutEnabled=0;
                    $user->AccessFailedCount=0;

                    return redirect('dashboard');

                } else {
                    $user->AccessFailedCount=$user->AccessFailedCount +1;
                    if($user->AccessFailedCount >= User::$AccessFailedCountLimit){
                        $user->LockoutEnabled=1;
                    }
                    $user->save();

                    return redirect()->back()
                        ->withErrors(["loginError" => "Username/Password Invalid"]);
                };
            }
        }
        return redirect()->back()
            ->withErrors(["loginError" => "Such account does not exist"]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Used to logout a user
     *
     * */
    public function logout()
    {
        $user = auth()->user();
//        $auditTrail = $this->auditTrail($user, AuditAction::$LOGOUT);
        Auth::logout();
        return redirect('/');
    }

    public function createUsers(Request $request)
    {
        dd('I am here');
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
