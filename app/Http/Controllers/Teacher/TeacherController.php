<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Master;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function Show_teacher_page()
    {$masters = Master::all();
        return view('admin_folder.manage_teacher.manage_teacher',['masters'=>$masters]);
    }

//Show add MJ page///
    public function Show_add_MJ_page()
    { $masters = Master::all();

        return view('admin_folder.manage_teacher.add_teacher',['masters'=>$masters]);
    }
//end Show  add MJ page///*

    //////ADD MJ/////
    public function add_teacher(Request $request)
    {
        $rules=    [
            'nom' => 'required ',
            'prenom' => 'required',
            'email' => 'required |  unique:users',
            'telephone' => 'required | unique:users,phone',

        ];
        $messages=       [
            'nom.required' =>'Ce champ est obligatoire',
            'email.unique'=>'Le email doit etre unique',
            'telephone.unique'=>'Le numero de telephone doit etre unique',
            'prenom.required' =>'Ce champ est obligatoire',
            'telephone.required' =>'Ce champ est obligatoire',


        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        $nom=\request('nom');

        $prenom=\request('prenom');
        $telephone=\request('telephone');
        $email=\request('email');

        $m=\request('master');
        $random_password = Str::random(10);
       $hashed_password=Hash::make($random_password);
       $user=new User();
       $user->name=$nom;
        $user->last_name=$prenom;
        $user->email=$email;
        $user->phone=$telephone;
        $user->password=$hashed_password;
        $user->role="teacher";
        $user->save();


        $master = Master::select('id')->where('title',$m)->get()->first();
        $enseignant=new Teacher();
        $enseignant->user_id=$user->id;
        $enseignant->master_id=$master->id;
        $master=$master->teachers()
            ->save($enseignant);



        $request ->session()->put('master',$m);
        $request ->session()->put('password',$random_password);
        $request ->session()->put('enseignant',$user->email);
        Mail::send('admin_folder.manage_teacher.Send_mail_to_teacher', ['email' => $user->email], function ($message) use ($request, $user) {
            $message->to($user->email)
                ->from('isgs@isgs.rnu.tn')
                ->subject('Demande de connexion au plateforme de master ');
            //mail section

        });

        return redirect()->back()->with(['success'=>'Enseignant ajouter avec succes ']);



    }

    //////end ADD MJ/////


    public function show_teacher_master($id_m)
    {



$teachers=DB::table("users")->join("teachers","users.id","teachers.user_id")
    ->select("users.name","users.email","users.phone","teachers.master_id")->
   where("teachers.master_id",$id_m)
    ->get();
        $t=DB::table("users")->join("teachers","users.id","teachers.user_id")
            ->select("teachers.master_id")->
            where("teachers.master_id",$id_m)
            ->get()->first();

if($t==null)
{
    return redirect()->back()->with(["success"=>"cet master n'inclut pas des enseignant "]);
}
        return view('admin_folder.manage_teacher.teacher_master',['teachers'=>$teachers,'t'=>$t]);
    }




    public function Show_master()
    { $masters = Master::all();

        return view('teacher_folder.master',['masters'=>$masters]);
    }


    public function home_teacher(Request $request,$id_master)
    {
        $user = auth()->user();
        // to do isdheken hatt numero men rasou f lien
//        $master= Master::find($id_master);
    $enseignant=Teacher::where("user_id",$user->id)->get()->first();

    if($enseignant->master_id==$id_master){
        $request ->session()->put('master',$id_master);

        return view("teacher_folder.profile_teacher",['master'=>$id_master]);
    } else {
        return abort(404);}

    }

    public function add_critere($id_m)
    {


            return view("teacher_folder.add_critere",['master'=>$id_m]);

    }


}
