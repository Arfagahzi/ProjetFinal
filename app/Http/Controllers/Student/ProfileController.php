<?php

namespace App\Http\Controllers\Student;

use App\Anneescolaire;
use App\Critere;
use App\Dossier;
use App\Http\Controllers\Controller;
use App\Inscription;
use App\Master;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    ///function that desplay all masters per type/////
    public function findmaster(Request $request){

        $data=Master::select('title','id')->where('type',$request->id)->take(100)->get();
        return response()->json($data);
    }
    ///end function that desplay all masters per type/////


    public function choose_master()
    {  $student = DB::table('users')
        ->join('inscriptions','inscriptions.user_id','=','users.id')
        ->join('masters','masters.id','=','inscriptions.master_id')
        ->select('masters.title','masters.type','users.name','users.last_name','inscriptions.id')
        ->where('users.id',auth()->user()->id)
        ->get();
        $i=1;
        return view("student.choose_master",['students'=>$student,'i'=>$i]);
    }


    /////tester l'existance de l'etudiant dans les masters////////////////////////////////////
    public function choisir_master(Request $request)
    { $rules=    [
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

        $count_student=DB::table('masters')->join('inscriptions','masters.id',"inscriptions.master_id")->where("inscriptions.user_id",auth()->user()->id)
            ->where("inscriptions.master_id",$master)->count();

        if($count_student==0)
        {
            $count_students=DB::table('masters')->join('inscriptions','masters.id',"inscriptions.master_id")
                ->where("masters.type",$type)
                ->where("inscriptions.user_id",auth()->user()->id)->count();

            if($count_students==0){
                $user=auth()->user();
                $inscription=new Inscription();
                $inscription->user_id=$user->id;
                $inscription->master_id=$master;
                $inscription->save();
                ///la creation d'un etudiant inscrit ///
                $student=new Student();
                $student->inscrit_id=$inscription->id;
                $student->save();
                ///la creation d'un etudiant inscrit ///
                ////////////////////////
                $dossier=new Dossier();
                $dossier->inscrit_id=$inscription->id;
                $dossier->save();
                ///////////




                $request ->session()->put('inscrit_id',$inscription->id);
                return redirect()->back()->with(['success'=> ' congrat !!! ']);
            }else {
                return redirect()->back()->with(["error"=>"Vous etes deja inscrit a cet master "]);


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

        $this->validate($request,[
            "name" => "required" ,
            "last_name" => "required",
            "sexe" => "required",
            "birthday" => "required",
            "birth_adresse"=> "required",
            "adresse"=> "required",
            "city"=> "required",
            "postal_code"=> "required",
            "phone"=> "required",
            "avatar"=> "required|image",
        ]);


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

        $user->profession = $request->post('profession');
        $user->company = $request->post('company');
        $user->profile = true;

        $user->save();


        return redirect()->back()->with("success","Your profile has been updated !");
    }


    public function dossier_page($inscrit_id)
    {
        $dossier=Dossier::where('inscrit_id',$inscrit_id)->get()->first();

        $user=auth()->user();

        return view("student.dossier",[
            "user" => $user,'dossier'=>$dossier
        ]);
    }

    public function dossier(Request  $request )
    {
        $this->validate($request,[
            "nbr_redoublement" => "required" ,
            "Annee_bac" => "required",
            "bac" => "required",
            "reo" => "required",
            "moyenne_bac"=> "required",
            "nom_diplome"=> "required",
            "date_diplome"=> "required",
            "img_diplome"=> "required",
            "pays"=> "required",
            "img_cin"=> "required",


        ]);

        $inscrit_id=session('inscrit_id');

        $dossier=Dossier::where('inscrit_id',$inscrit_id)->get()->first();

        $dossier->nbr_redoublement = $request->post('nbr_redoublement');
        $dossier->Annee_bac = $request->post('Annee_bac');
        $dossier->bac = $request->post('bac');
        $dossier->reo = $request->post('reo');
        $dossier->moyenne_bac = $request->post('moyenne_bac');
        $dossier->nom_diplome = $request->post('nom_diplome');
        $dossier->date_diplome = $request->post('date_diplome');
        $dossier->img_diplome = $request->post('img_diplome');
        $dossier->pays = $request->post('pays');
        $dossier->img_cin = $request->post('img_cin');
        $dossier->save();
        return redirect()->back()->with("success","Your profile has been updated !");

    }


}
