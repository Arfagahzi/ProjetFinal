<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
//    //to add
//    public function reset_password(Request $request)
//    {
//
//        request()->validate([
//            'email' => ['required', 'email'],
//        ]);
//        //mail section
//        $user = User::where('email', '=', request('email'))
//            ->get()->first();
//
//        if ($user==null)
//        {
//            return redirect('/resetpassword')->withErrors([
//                'email'=> "Ce e-mail n'existe pas"
//            ]);
//
//        }
//
//        Mail::send('viewetudiant.Send_mail', ['email' => $user->email], function ($message) use ($request, $user) {
//            $message->to($user->email)
//                ->from('isgs@isgs.rnu.tn')
//                ->subject('Demande  réinitialisation de mot de passe');
//            //mail section
//
//        });
//
//        Session::flash('success', "Nous avons envoyé votre lien de réinitialisation de mot de passe par e-mail");
//        return redirect('/reset');
//
//    }
}
