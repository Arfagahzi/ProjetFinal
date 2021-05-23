<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo(){
        $user = auth()->user();
        switch ($user->role) {
            case "student":
                return route("home_student");
                break;
            case "admin":
                return route("home_admin");
                break;
            case "teacher":
                return route("show_master");
                break;
            default:
                return route("home_student");
        }
    }
    public function login_admin()
    {

        return view("admin_folder.login_admin");
    }
    public function login_teacher()
    {

        return view("teacher_folder.teacher_login");
    }
}
