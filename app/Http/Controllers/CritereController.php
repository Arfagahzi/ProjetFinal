<?php

namespace App\Http\Controllers;

use App\Candidature;
use App\Critere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CritereController extends Controller
{
    public function critere()
    {
        return view('teacher_folder.add_critere');
    }


    public function addcritere(Request $request)
    {

        $critere = new Critere();
        $critere->critere = $request->post('critere');
        $critere->coefficient = $request->post('coefficient');
        $critere->status = $request->post('status');
        $critere->bonnus = $request->post('bonnus');
        $critere->id_master = session('id_master');
        $critere->save();

        return redirect()->back();

    }

    public function calcule_score_page()
    {

        $candidatur=Candidature::where('id_insc',session('inscrit_id'))->get();

        $student = DB::table("users")->join("inscriptions", "users.id", "inscriptions.user_id")->
    where('inscriptions.user_id', Auth()->user()->id)
        ->get()->first();
        session(['master'=>$student->master_id]);
        $criteres = Critere::Where('id_master', $student->master_id)->get();
        return view('student.calcule_score', [
            "criteres" => $criteres,'candidature'=>$candidatur
        ]);
    }

    public function add_calcule_score_page(Request $request)
    {

$nbr=$request->nbr;


for ($i = 1; $i <= $nbr; $i++)
{
    $indice = "a".$i;
    echo ($request->$indice ."-----".$request[$request->$indice] ."<br>" ) ;


   $candidature=new Candidature();
   $candidature->valeur=$request[$request->$indice];
   $candidature->id_critere=$request->$indice;
   $candidature->id_insc=session('inscrit_id');
   $candidature->save();

}

        return  redirect()->back();
    }
}
