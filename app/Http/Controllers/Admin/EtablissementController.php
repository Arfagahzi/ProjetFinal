<?php

namespace App\Http\Controllers\Admin;

use App\Etablissement;
use App\Http\Controllers\Controller;
use App\Universite;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;




class etablissementController extends Controller
{
    public function Show_etablissement_page(){
        $etablissements = DB::table('universites')
            ->join('etablissements','universites.id','=','etablissements.univ_id')
            ->select('universites.universite','etablissements.etablissement','etablissements.id')
            ->get();
        $i=1;
        return view('admin_folder.gereretablissement.gereretablissement',['etablissements'=>$etablissements,'i'=>$i]);

    }

    public function Show_add_etablissement_page(){
        $universites=Universite::all();
        return view('admin_folder.gereretablissement.ajouter_etablissement',['universites'=>$universites]);
    }

    public function add_etablissement(Request $request)
    {
        $rules=    [
            'etablissement' => 'required | unique:etablissements,etablissement',

        ];
        $messages=       [
            'etablissement.required' =>'Ce champ est obligatoire',
            'etablissement.unique'=>'Ce etablissement existe déja',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        $e=\request('etablissement');

        $u=\request('universite');
        $id_univ=Universite::select('id')->where('universite',$u)->get()->first();

        $etablissement=new Etablissement();
        $etablissement->etablissement=$e;
        $etablissement->univ_id=$id_univ->id;
        $etablissement->save();
        return redirect()->back()->with(['success'=>'Etablissement ajouter avec succes ']);

    }

    public function update_etablissement($id_etab)
    {$etab= Etablissement::find($id_etab);
        $universites=Universite::all();
        if(!$etab)
            return redirect()->back();
        $etablissements = DB::table('universites')
            ->join('etablissements','universites.id','=','etablissements.univ_id')
            ->select('universites.universite','etablissements.etablissement','etablissements.id')
            ->where('etablissements.id',$id_etab)
            ->get()->first();
        return view("admin_folder.gereretablissement.update_etablissement",['etablissements'=>$etablissements,'universites'=>$universites]);

    }


    public function updt_etab_page(Request $request)
    { $rules=    [
        'etablissement' => 'required | unique:etablissements,etablissement',

    ];

        $messages=       [

            'etablissement.required' =>'Ce champ est obligatoire',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        $id=\request('id');
        $etab=\request('etablissement');
        $univ=\request('universite');

        $universite=Universite::select('id')->where('universite',$univ)->get()->first();
        $e= Etablissement::find($id);
        $e->etablissement =$etab;
        $e->univ_id=$universite->id;

        $e->save();

        return redirect()->back()->with(['success'=>'Etablissement Modifier avec succes ']);


    }

    /////delete master /////
    public function delete_etab($id_e) {

        $etablissement=Etablissement::find($id_e);
        $etablissement->delete();


        return redirect()->back()->with(['success'=>'Master Supprimer avec succes ']);

    }
    /////end delete master /////



}
