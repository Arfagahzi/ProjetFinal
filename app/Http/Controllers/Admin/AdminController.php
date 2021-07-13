<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function liste_admin(Request $request)
    {


        $admins = User::where('role', 'admin')->get();
        $i = 1;
        return view('admin_folder.gereradmin.liste_admin', ['admins' => $admins, "i" => $i]);
    }

    public function show_add_admin_page(Request $request)
    {

        return view('admin_folder.gereradmin.ajouter_admin');
    }

    public function add_admin(Request $request)
    {
        $rules = [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required | unique:users,email',
            'phone' => 'required | unique:users,phone',

        ];
        $messages = [
            'name.required' => 'Ce champ est obligatoire',
            'last_name.required' => 'Ce champ est obligatoire',
            'phone.required' => 'Ce champ est obligatoire',
            'phone.unique' => ' ce Numéro  existe déja',
            'email.required' => ' Ce champ est obligatoire',
            'email.unique' => ' email existe déja',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        $random_password = Str::random(10);
        $hashed_password = Hash::make($random_password);

        $user = new User();

        $user->name = \request('name');
        $user->last_name = \request('last_name');
        $user->email = \request('email');
        $user->phone = \request('phone');
        $user->password = $hashed_password;
        $user->role = "admin";
        $user->avatar = "prof.png";
        $user->save();
        $request->session()->put('password', $random_password);
        $request->session()->put('admin', $user->email);

        Mail::send('admin_folder.gereradmin.email_to_admin', ['email' => $user->email], function ($message) use ($request, $user) {
            $message->to($user->email)
                ->from('isgs@isgs.rnu.tn')
                ->subject("Demande d'adhésion au plateforme");
            //mail section

        });
        return redirect()->back()->with(['success' => 'Administrateur  ajouter avec succes ']);


    }

    public function change_pass_page()
    {
        return view('admin_folder.change_passe');
    }

    public function change_pass_post(Request $request)
    {
        $rules = [
            "password" => "required|confirmed",
            "password_confirmation" => "required",


        ];
        $messages = [
            "password.required" => "Ce champ est obligatoire",
            "password_confirmation.required" => "Ce champ est obligatoire",
            "password.confirmed" => "Les champs ne sont pas les memes",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        $password = $request->post('password');
        $user1 = auth()->user();
        $user = User::where('email', $user1->email)->select('password', 'id')->get()->first();
        $user->password = Hash::make($password);
        $user->save();
        return redirect()->back()->with("success", "Your password has been updated !");

    }
//page mta3 affichage
        public function upd_profile_page(){
        return view('admin_folder.gereradmin.profile_page');
        }
        //page mta3 post update
    public function upd_profile(){
        return view('admin_folder.gereradmin.upd_profile');
    }

    public function update_profile(){


       $user=User::findOrFail(Auth()->user()->id) ;

        $user->name=\request('nom');
        $user->last_name=\request('prenom');
        $user->email=\request('email');
        $user->phone=\request('phone');
        $user->birthday=\request('date_nais');
        $user->adresse=\request('adress');
        $user->city=\request('ville');
        $user->save();


        return redirect()->route('upd_profile_admin');
    }
    public  function change_admin_image()
    {
        return view('admin_folder.gereradmin.admin_img',array('user'=>auth::user()));

    }

    public  function image_admin_post(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }

        return redirect()->back();
    }
}
