<?php

namespace App\Http\Controllers\student;

use App\Anneescolaire;
use App\Etablissement;
use App\Filiere;
use App\Http\Controllers\Controller;
use App\Universite;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class AnneescolaireController extends Controller
{
    public function Anneescolaire_page()
    {

        $universites=Universite::all();

        $user=auth()->user();
        $i=1;
        return view("student.anneescolaire ",[
            "user" => $user,'universites'=>$universites,'i'=>$i
        ]);
    }

    public function findetablissement(Request $request){

        $data=Etablissement::select('etablissement','id')->where('univ_id',$request->id)->get();
        return response()->json($data);
    }

    /**find filiere by id etablissement
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function findfiliere(Request $request){
        $data = Filiere::select('filiere','id')
                        ->where('etablissement_id',$request->id)
                        ->get();
        return response()->json($data);
    }

    public function submit_data(Request $request)
    {
        $a= $request->annee;
        $session = $request->sesion;
        $montion = $request->montion;
        $universite = $request->universite;
        $r = $request->resultat;
        $etablissement = $request->etablissement;
        $filiere = $request->filiere;

        $inscrit_id=session('inscrit_id');

        foreach($request->moyenne as $key=>$moy)
        {
            $data=new Anneescolaire();
            $data->annee=$a[$key];
            $data->moyenne=$moy;
            $data->resultat=$r[$key];
            $data->session=$session[$key];
            $data->mention=$montion[$key];
            $data->universite_id=$universite[$key];
            $data->etablissement_id=$etablissement[$key];
            $data->filiere_id=$filiere[$key];
            $data->inscrit_id=$inscrit_id;
            $data->save();

        }
        return view("student.imprimer_recu");

    }
}
