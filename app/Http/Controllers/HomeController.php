<?php

namespace App\Http\Controllers;

use App\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('FrontEnd.accueil');
    }
    public function home_admin()
    {
//        $inscriptions = DB::table("users")->join("inscriptions", "users.id", "inscriptions.user_id")
//            ->get();
//$i=1;
        $masters = Master::all();
        return view('admin_folder.profile_admin', ['masters' => $masters]);
    }


}
