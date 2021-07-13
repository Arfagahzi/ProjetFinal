<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Student;
use App\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        $user = auth()->user();
        switch ($user->role) {
            case "student":
                $student=new Student();
                $student->user_id=auth()->user()->id;
                $student->save();
                return

                    route("home_student");

                break;
            case "admin":
                return route("home_admin");
                break;
            case "responsible_teacher":
                return route("home_teacher");
                break;
            default:
                return route("home_student");
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data )
    {


        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'cin' => ['required', 'string', 'unique:users','min:8','max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){


     


        return User::create([
        'name' => $data['name'],
        'last_name' => $data['last_name'],
        'cin' => $data['cin'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        "role" => "student",
        "avatar" => "prof.png",
    ]);

}

}
