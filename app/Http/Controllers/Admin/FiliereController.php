<?php

namespace App\Http\Controllers\Admin;

use App\Etablissement;
use App\Filiere;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class FiliereController extends Controller
{


        public  function show_filiere_page()
        {
            $filieres =DB::table('etablissements')
                ->join('filieres','etablissements.id','=','filieres.etablissement_id')
                ->select('etablissements.etablissement','filieres.filiere','filieres.id','filieres.niveau')
                ->get();
            $i=1;
            return view('admin_folder.gererfiliere.gerer_filiere',['filieres'=>$filieres,'i'=>$i]);
        }

    public  function show_add_filiere()
    {
        $etablissements = Etablissement::select('etablissement')->get();

        return view('admin_folder.gererfiliere.ajouter_filiere',['etablissements'=>$etablissements]);

    }

    public  function add_filiere(Request $request)
    {
        $rules=    [
            'filiere' => 'required ',

        ];
        $messages=       [
            'filiere.required' =>'Ce champ est obligatoire',

        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        $f=\request('filiere');
        $niveau=\request('niveau');
        $e=\request('etablissement');
        $id_etab=Etablissement::select('id')->where('etablissement',$e)->get()->first();

        $filiere=new Filiere();
        $filiere->filiere=$f;
        $filiere->niveau=$niveau;
        $filiere->etablissement_id=$id_etab->id;
        $filiere->save();
        return redirect()->back()->with(['success'=>'Filiere ajouter avec succes ']);
    }

    public  function Show_update_filiere_page($id_f)
    {
        $fil= Filiere::find($id_f);

        $etablissements=Etablissement::all();
        if(!$fil)
            return redirect()->back();
        $filieres = DB::table('etablissements')
            ->join('filieres','etablissements.id','=','filieres.etablissement_id')
            ->select('etablissements.etablissement','filieres.filiere','filieres.id','filieres.niveau')
            ->where('filieres.id',$id_f)
            ->get()
            ->first();
        return view('admin_folder.gererfiliere.update_filiere',['etablissements'=>$etablissements,'filieres'=>$filieres]);
 }

    public  function update_filieres(Request $request)
    {
        $rules=    [
            'filiere' => 'required ',
            'niveau' => 'required',
            'etablissement' => 'required',
        ];

        $messages=       [
            'filiere.required' =>'Ce champ est obligatoire',
            'niveau.required' =>'Ce champ est obligatoire',
            'etablissement.required' =>'Ce champ est obligatoire',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        $id=\request('id');
        $fil=\request('filiere');
        $etab=\request('etablissement');
        $niv=\request('niveau');
        $etablissement=Etablissement::select('id')->where('etablissement',$etab)->get()->first();
        $filiere= Filiere::find($id);
        $filiere->filiere =$fil;
        $filiere->etablissement_id=$etablissement->id;
        $filiere->niveau = $niv;
        $filiere->save();

        return redirect()->back()->with(['success'=>'Filiere Modifier avec succes ']);


    }
    public  function delete_filiere($id_e)
    {
        $fil=Filiere::find($id_e);

        $fil->delete();

        return redirect()->back()->with(['success'=>'Filiere Supprimer avec succes ']);

    }


}
