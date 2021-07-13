<?php

namespace App\Http\Controllers\Student;

use App\Anneescolaire;
use App\Critere;
use App\Dossier;
use App\Http\Controllers\Controller;
use App\Inscription;
use App\Master;
use App\Student;
use App\Universite;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\UploadedFile;
class ProfileController extends Controller
{

    ///function that desplay all masters per type/////
    public function findmaster(Request $request){

        $data=Master::select('title','id')->where('type',$request->id)->take(100)->get();
        return response()->json($data);
    }
    ///end function that desplay all masters per type/////

////affichage des masters e l'etudiant
    public function choose_master()
    {     $s=DB::table("users")
        ->join("students","users.id","students.user_id")
        ->join("inscriptions","students.id","inscriptions.id_student")
        ->join("masters","inscriptions.master_id","masters.id")
        ->select('inscriptions.master_id','inscriptions.id',"masters.title","masters.type","users.name","users.last_name")

        ->where("students.user_id",auth()->user()->id)

        ->where("inscriptions.annuler","non")->count();
    $message="Vous n'est pas inscrit à aucune mastère  ";
    if ($s==0){
        return view("student.choose_master",['message'=>$message,"s"=>$s]);

    }
else {
        $student=DB::table("users")
        ->join("students","users.id","students.user_id")
        ->join("inscriptions","students.id","inscriptions.id_student")
        ->join("masters","inscriptions.master_id","masters.id")
        ->select('inscriptions.master_id','inscriptions.id',"masters.title","masters.type","users.name","users.last_name")

        ->where("students.user_id",auth()->user()->id)

        ->where("inscriptions.annuler","non")->get();


        $i=1;
        return view("student.choose_master",['students'=>$student ,'i'=>$i ,"s"=>$s]);
    }
    }


////affichage des masters e l'etudiant
///
///
    public function choisir_master(Request $request)
    {


        $rules=    [
        'master' => 'required',
        'type' => 'required',
    ];
        $messages=       [
            'master.required' =>'Ce champ est obligatoire',
            'type.required' =>'Ce champ est obligatoire',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        $master=\request('master');
        $type=\request('type');
        if($type != "recherche" && $type != "professionnel" && $type != "Co-construit" )

        {
            return redirect()->back()->with(['error'=>'Ce type ne correspond pas !']);

        }
        $count_student=DB::table("users")
            ->join("students","users.id","students.user_id")
            ->join("inscriptions","students.id","inscriptions.id_student")
            ->join("masters","inscriptions.master_id","masters.id")
            ->where("students.user_id",auth()->user()->id)
            ->where("inscriptions.master_id",$master)
            ->where("masters.type",$type)
            ->where("inscriptions.annuler","non")
            ->count();

        if($count_student==0)
        {
            $student=DB::table("users")
                ->join("students","users.id","students.user_id")
                ->select("students.id")
                ->where("students.user_id",auth()->user()->id)
                ->get()->first();


            $s=DB::table("masters")
                ->join("Date_inscrit","masters.id","Date_inscrit.master_id")
                ->select("Date_inscrit.date_debut","Date_inscrit.date_fin")
                ->where("Date_inscrit.master_id",$master)
                ->get()->first();
            $todayDate = date("Y-m-d");
if ($s->date_debut < $todayDate && $s->date_fin >$todayDate){
                $inscrit=new Inscription();

                $inscrit->master_id=$master;
                $inscrit->id_student=$student->id;
                $inscrit->save();







                $request ->session()->put('master',$master);

                $request ->session()->put('inscrit_id',$inscrit->id);
                return redirect()->back();}
else {
    return redirect()->back()->with(["e"=>"La date de cet Mastère est expiré"]);
}

        }else{
            return redirect()->back()->with(["error"=>"Vous etes deja inscrit a cet master "]);
        }
    }
    /////tester l'existance de l'etudiant dans les masters





    public function student_profile($inscrit_id,Request $request)
    {
        $request ->session()->put('inscrit_id',$inscrit_id);
        return view("student.profile",[
            "user" => auth()->user(),'inscrit_id'=>$inscrit_id
        ]);
    }






    public function update_profile(Request $request)
    {


        $user = auth()->user();

        $user->name = $request->post('name');
        $user->last_name = $request->post('last_name');
        $user->sexe = $request->post('sexe');
        $user->birthday = $request->post('birthday');
        $user->birth_adresse = $request->post('birth_adresse');

        $user->adresse = $request->post('adresse');

        $user->city = $request->post('city');
        $user->postal_code = $request->post('postal_code');
        $user->phone = $request->post('phone');

        $user->avatar = $request->post('avatar');

        $user->save();

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }
$inscrit_id= session('inscrit_id');

        $count=Dossier::where('inscrit_id',$inscrit_id)->count();
        if ($count ==0) {

            return view("student.dossier",["count"=>$count]);
        }else{
            $dossier=Dossier::where('inscrit_id',$inscrit_id)->get()->first();
            return view("student.dossier",["dossier"=>$dossier,"count"=>$count]);
        }

    }


    public function dossier_page($inscrit_id)
    {
        $count=Dossier::where('inscrit_id',$inscrit_id)->count();
if ($count ==0) {

    return view("student.dossier",["count"=>$count]);
}else{
    $dossier=Dossier::where('inscrit_id',$inscrit_id)->get()->first();
    return view("student.dossier",["dossier"=>$dossier,"count"=>$count]);
}
    }

    public function dossier(Request  $request )
    {
        $rules=    [

            "Annee_bac" => "required",
            "bac" => "required",
            "reo" => "required",
            "moyenne_bac"=> "required",
            "nom_diplome"=> "required",
            "date_diplome"=> "required",
//            "img_diplome"=> "required",

            "session_bac"=> "required",
            "mention_bac"=> "required",
//            "certificat_succee"=> "required",
            "nature_diplome"=> "required",


    ];
        $messages=       [

            "Annee_bac" => "Ce champ est obligatoire",
            "bac" => "Ce champ est obligatoire",
            "reo" => "Ce champ est obligatoire",
            "moyenne_bac"=> "Ce champ est obligatoire",
            "nom_diplome"=> "Ce champ est obligatoire",
            "date_diplome"=> "Ce champ est obligatoire",
//            "img_diplome"=> "Ce champ est obligatoire",

//            "img_cin_face1"=> "Ce champ est obligatoire",
            "session_bac"=> "Ce champ est obligatoire",
            "mention_bac"=> "Ce champ est obligatoire",
//            "certificat_succee"=> "Ce champ est obligatoire",
            "nature_diplome"=> "Ce champ est obligatoire",

        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }


        $inscrit_id=session('inscrit_id');


        $dossier=new Dossier();

        $dossier->Annee_bac = $request->post('Annee_bac');
        $dossier->bac = $request->post('bac');
        $dossier->reo = $request->post('reo');
        $dossier->session_bac = $request->post('session_bac');
        $dossier->mention_bac = $request->post('mention_bac');

        $dossier->nature_diplome = $request->post('nature_diplome');
        $dossier->moyenne_bac = $request->post('moyenne_bac');
        $dossier->nom_diplome = $request->post('nom_diplome');
        $dossier->date_diplome = $request->post('date_diplome');

//        $dossier->certificat_succee_bac = $request->post('certificat_succee_bac');

//        $dossier->img_reo = $request->post('img_reo');
//
//
//
//        $dossier->img_diplome = $request->post('img_diplome');
//
//        $dossier->img_cin_face1 = $request->post('img_cin_face1');
//        $dossier->img_cin_face2 = $request->post('img_cin_face2');
        $dossier->inscrit_id =$inscrit_id;

        $dossier->save();
        $universites=Universite::all();
        return view("student.anneescolaire",['universites'=>$universites]);

    }



    public function modifier_dossier(Request  $request )
    {
        $rules=    [

            "Annee_bac" => "required",
            "bac" => "required",
            "reo" => "required",
            "moyenne_bac"=> "required | min :0 |max :20",
            "nom_diplome"=> "required",
            "date_diplome"=> "required",
//            "img_diplome"=> "required",

            "session_bac"=> "required",
            "mention_bac"=> "required",
//            "certificat_succee"=> "required",
            "nature_diplome"=> "required",


        ];
        $messages=       [

            "Annee_bac.required" => "Ce champ est obligatoire",
            "bac.required" => "Ce champ est obligatoire",
            "reo.required" => "Ce champ est obligatoire",
            "moyenne_bac.required"=> "Ce champ est obligatoire",
            "moyenne_bac.min"=> "La valeur minimum est 0",
            "moyenne_bac.max"=> "La valeur minimum est 20",
            "nom_diplome.required"=> "Ce champ est obligatoire",
            "date_diplome.required"=> "Ce champ est obligatoire",
//            "img_diplome"=> "Ce champ est obligatoire",

//            "img_cin_face1"=> "Ce champ est obligatoire",
            "session_bac.required"=> "Ce champ est obligatoire",
            "mention_bac.required"=> "Ce champ est obligatoire",
//            "certificat_succee"=> "Ce champ est obligatoire",
            "nature_diplome.required"=> "Ce champ est obligatoire",

        ];


        $inscrit_id=session('inscrit_id');
        $dossier=Dossier::where("inscrit_id",$inscrit_id)->get()->first();
        $dossier->Annee_bac = $request->post('Annee_bac');
        $dossier->bac = $request->post('bac');
        $dossier->reo = $request->post('reo');
        $dossier->session_bac = $request->post('session_bac');
        $dossier->mention_bac = $request->post('mention_bac');
        $dossier->certificat_succee_bac = $request->post('certificat_succee_bac');
        $dossier->nature_diplome = $request->post('nature_diplome');
        $dossier->moyenne_bac = $request->post('moyenne_bac');
        $dossier->nom_diplome = $request->post('nom_diplome');
        $dossier->date_diplome = $request->post('date_diplome');
        $dossier->img_diplome = $request->post('img_diplome');
        $dossier->img_reo = $request->post('img_reo');
        $dossier->img_cin_face1 = $request->post('img_cin_face1');
        $dossier->img_cin_face2 = $request->post('img_cin_face2');
        $dossier->inscrit_id =$inscrit_id;

        $dossier->save();

        if ($request->hasFile('certificat_succee_bac')) {
            $filename = $request->certificat_succee_bac->getClientOriginalName();
            $request->certificat_succee_bac->storeAs('images', $filename, 'public');
            $dossier->update(['certificat_succee_bac' => $filename]);
        }

        $universites=Universite::all();

        return view("student.anneescolaire",['universites'=>$universites]);

    }






    public function change_password( ){
        return view('password.change_password');
    }


    public function change_password_post(Request  $request ){
        $rules=    [
            "password" => "required|confirmed" ,
            "password_confirmation" => "required",


        ];
        $messages=       [
            "password.required" => "Ce champ est obligatoire" ,
            "password_confirmation.required" => "Ce champ est obligatoire" ,
            "password.confirmed" => "Les champs ne sont pas les memes" ,
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
     $password=   $request->post('password');
        $user1=auth()->user();
        $user=User::where('email',$user1->email)->select('password','id')->get()->first();
        $user->password=Hash::make($password);
        $user->save();
        return redirect()->back()->with("success","Your password has been updated !");

    }
    public function change_image(){
        return view('student.image',array('user'=>auth::user()));
    }

    public function change_image_post(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }

        return redirect()->back();
    }

}
