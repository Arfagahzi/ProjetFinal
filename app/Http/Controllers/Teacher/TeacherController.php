<?php

namespace App\Http\Controllers\Teacher;

use App\Affectation;
use App\Anneescolaire;
use App\Candidature;
use App\Critere;
use App\Http\Controllers\Controller;
use App\Inscription;
use App\Master;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function Show_teacher_page()
    {
        $masters = Master::all();
        return view('admin_folder.manage_teacher.manage_teacher', ['masters' => $masters]);
    }

//Show add MJ page///
    public function Show_add_MJ_page()
    {
        $masters = Master::all();
        return view('admin_folder.manage_teacher.add_teacher', ['masters' => $masters]);
    }
//end Show  add MJ page///*

    //////ajouter enseignant dans une mastere/////
    public function add_teacher(Request $request)
    {


        $rules = [


            'nom' => 'required ',
            'prenom' => 'required',
            'email' => 'required |  unique:users,email',
            'telephone' => 'required | unique:users,phone',
            'grade' => 'required ',


        ];
        $messages = [
            'nom.required' => 'Ce champ est obligatoire',
            'email.unique' => 'Le email doit etre unique',
            'telephone.unique' => 'Le numero de telephone doit etre unique',
            'prenom.required' => 'Ce champ est obligatoire',
            'telephone.required' => 'Ce champ est obligatoire',
            'grade.required' => 'Ce champ est obligatoire',

        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        $nom = \request('nom');
        $prenom = \request('prenom');
        $telephone = \request('telephone');
        $email = \request('email');
        $m = \request('master');
        $grade = \request('grade');

        $random_password = Str::random(10);
        $hashed_password = Hash::make($random_password);
        $master = Master::select('id')->where('title', $m)->get()->first();


                    $user = new User();

                    $user->name = $nom;
                    $user->last_name = $prenom;
                    $user->email = $email;
                    $user->phone = $telephone;
                    $user->password = $hashed_password;
                    $user->role = "responsible_teacher";
                    $user->avatar = "prof.png";

                    $user->save();


                    $enseignant = new Teacher();
                    $enseignant->user_id = $user->id;
                    $enseignant->grade = $grade;
                    $enseignant->save();

                    $affectation=new Affectation();
                    $affectation->id_enseignant=$enseignant->id;
                    $affectation->master_id=$master->id;
                    $affectation->save();


                    $request->session()->put('id_master', $master->id);

                    $request->session()->put('master', $m);
                    $request->session()->put('password', $random_password);
                    $request->session()->put('enseignant', $user->email);
                    Mail::send('admin_folder.manage_teacher.Send_mail_to_teacher', ['email' => $user->email], function ($message) use ($request, $user) {
                        $message->to($user->email)
                            ->from('isgs@isgs.rnu.tn')
                            ->subject("Demande d'adhésion au plateforme");
                        //mail section

                    });

                    return redirect()->back()->with(['success' => 'Enseignant  ajouter avec succes ']);

        }

    //////ajouter enseignant dans une mastere/////

    public function password_link()
    {
        return view('admin_folder.manage_teacher.password_link');
    }

///// afficher liste des enseignant par masterer////

    public function show_teacher_master( Request $request,$id_m)
    {

        $request->session()->put('master', $id_m);
        $teachers = DB::table("users")->join("teachers", "users.id", "teachers.user_id")
          -> join("affecter_ens", "teachers.id", "affecter_ens.id_enseignant")
            ->select("users.name", "users.email","users.last_name", "users.phone", "teachers.grade", "teachers.id")->
            where("affecter_ens.master_id", $id_m)
            ->get();
        $t= DB::table("users")->join("teachers", "users.id", "teachers.user_id")
            -> join("affecter_ens", "teachers.id", "affecter_ens.id_enseignant")
            ->select( "affecter_ens.master_id")->
            where("affecter_ens.master_id", $id_m)
            ->get()->first();
        $i=1;

$master=Master::where("id",$id_m)->get()->first();

        if ($t== null) {
            return redirect()->back()->with(["success" => "cet master n'inclut pas des enseignant "]);
        }
        return view('admin_folder.manage_teacher.teacher_master', ['teachers' => $teachers,'master'=>$master,'i'=>$i,'t'=>$t]);


    }
///// afficher liste des enseignant par masterer////



    public function Show_master()
    {

        $teacher = DB::table("users")->join("teachers", "users.id", "teachers.user_id")
            ->join("affecter_ens","teachers.id","affecter_ens.id_enseignant")
            ->select("affecter_ens.master_id")
            ->get()->first();


        $master=Master::select("title","id")->where('id',$teacher->master_id)->get()->first();

        session(['id_master'=>$master->id]);

        return view('teacher_folder.profile_teacher', [
            'teacher' => $teacher,'master'=>$master

        ]);
    }







    public function delete($id_teacher)
    {
      $teacher=  Teacher::findOrFail($id_teacher);
        $teacher  ->delete();
        return redirect()->back()->with('message', 'Enseignant supprimer avec succée');

    }


        public  function change_teacher_image()
        {
            return view('teacher_folder.image',array('user'=>auth::user()));

        }

        public  function image_teacher_post(Request $request)
        {
            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $request->image->storeAs('images', $filename, 'public');
                auth()->user()->update(['avatar' => $filename]);
            }

            return redirect()->back();
        }

        public  function gerer_addmision_page(){
        $master=Master::select("title","id")->where('id',session('id_master'))->get()->first();
            $student=DB::table("users")
                ->join("students","users.id","students.user_id")
                ->join("inscriptions","students.id","inscriptions.id_student")
                ->select("inscriptions.id_student","inscriptions.id","users.name","users.last_name","users.email","users.avatar")

                ->where("inscriptions.master_id",$master->id)

                ->where("inscriptions.annuler","non")
                ->get();
         $i=1;


            return view('teacher_folder.gereradmission', [
                'master' => $master,"students"=>$student,"i"=>$i

            ]);

        }
        public function  profile_teacher_page(){
            return view('teacher_folder.profile.profile_page_teacher');
        }
        public function  page_update_profile_teacher(){
            return view('teacher_folder.profile.upd_profile_teacher');
        }
        public function  update_profile_teacher_post(){

            $user=User::findOrFail(Auth()->user()->id) ;

            $user->name=\request('nom');
            $user->last_name=\request('prenom');
            $user->email=\request('email');
            $user->phone=\request('phone');
            $user->birthday=\request('date_nais');
            $user->adresse=\request('adress');
            $user->city=\request('ville');
            $user->save();
            return redirect()->route('profile_teacher_page');

        }
        public  function teacher_change_pass_page()
        {
            return view('teacher_folder.password.change_password');

        }
          public  function teacher_change_pass_post(Request $request)
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
            return redirect()->back()->with("success", "Votre mot de passe a été mis à jour !");
        }

}
