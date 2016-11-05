<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
     * @param  array  $data
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
        if ($user != null) {
            if ($user->EmailConfirmed == 0||$user->PhoneNumberConfirmed == 0) {
                return redirect()->intended('auth/verify/' . $user->id);
            } else if ($user->IsActive == 0) {
                return redirect()->intended()
                    ->withErrors(["loginError" => "Your Account is deactivated. Please contact admin for details/Reactivation"]);
            } else if ($user->TwoFactorEnabled == 1) {
                return Auth::attempt($userData) ? redirect()->intended() : redirect()->intended()
                    ->withErrors(["loginError" => "Unable to login"]);
            } else {
                return redirect()->intended()
                    ->withErrors(["loginError" => "An Unknown account!"]);
            }
        }
        return redirect()->intended()
            ->withErrors(["loginError" => "Such account does not exist"]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
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
        $user->status = 0;
        $user->save();

        Auth::logout();
        return redirect()->intended();
    }

}
