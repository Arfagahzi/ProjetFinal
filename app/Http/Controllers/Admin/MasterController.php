<?php

        namespace App\Http\Controllers\Admin;

        use App\Anneuniversitaire;
        use App\Date_inscrit;
        use App\Http\Controllers\Controller;
        use App\Master;
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\DB;
        use Illuminate\Support\Facades\Validator;
        use RealRashid\SweetAlert\Facades\Alert;

        class MasterController extends Controller
        {
            public function Show_master_page()
            {
                $masters = Master::all();
                $i=1;
                return view('admin_folder.managemaster.gerermaster',['masters'=>$masters,'i'=>$i]);
            }

            /// Show add master page///////
            public function Show_add_master_page()
            {

                return view('admin_folder.managemaster.add_master');
            }
            /// Show add master page////////
            ////add master function//////
            public function add_master(Request $request) {

                $rules=    [
                    'title' => 'required | unique:masters,title',
                    'type' => 'required',
                ];

                $messages=       [
                    'title.required' =>'Ce champ est obligatoire',
                    'type.required' =>'Ce champ est obligatoire',


                ];
                $validator = Validator::make($request->all(),$rules,$messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInputs($request->all());
                }

                $m=\request('title');
                $type_m=\request('type');
                if($type_m != "recherche" && $type_m != "professionnel" && $type_m != "Co-construit" )

                {
                    return redirect()->back()->with(['error'=>'Ce type ne correspond pas !']);

                }


                $detail=\request('detail');
                $image=\request('image');
                $master=new Master();
                $master->title=$m;
                $master->type=$type_m;
                $master->detail=$detail;
                $master->image=$image;
                $master->save();
                if ($request->hasFile('image')) {
                    $filename = $request->image->getClientOriginalName();
                    $request->image->storeAs('images', $filename, 'public');
                 $master->update(['image' => $filename]);
                }

                return redirect()->back()->with(['success'=>'Master ajouter avec succes !']);
            }
            ////add master function//////

        ////show update master page//////
            public function Show_update_master_page($id_master)
            {

                $master= Master::find($id_master);
                if(!$master)
                    return redirect()->back();

                $masters=Master::select('id','title','type','detail','image')->find($id_master);
                return view('admin_folder.managemaster.update_master',['masters'=>$masters]);
            }


            ///////Modifier master///////
            public function update_master(Request $request) {
                $rules=    [
                    'title' => 'required | unique:masters,title',
                    'type' => 'required',
                ];

                $messages=       [
                    'title.required' =>'Ce champ est obligatoire',
                    'type.required' =>'Ce champ est obligatoire',


                ];

                $validator = Validator::make($request->all(),$rules,$messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInputs($request->all());
                }
                $id=\request('id');

                $m=\request('title');
                $type_m=\request('type');
                $detail=\request('detail');
                if($type_m != "recherche" && $type_m != "professionnel" &&$type_m != "Co-construit" )
                {
                    return redirect()->back()->with(['error'=>'Ce type ne correspond pas !']);

                }
                $master= Master::find($id);
                $master->title =$m;
                $master->type=$type_m;
                $master->detail=$detail;
                if ($request->hasFile('image')) {
                    $filename = $request->image->getClientOriginalName();
                    $request->image->storeAs('images', $filename, 'public');
                    $master->update(['image' => $filename]);
                }
                $master->save();

                return redirect()->back()->with(['success'=>'Master Modifier avec succes ']);
            }
        ////fin modifier///
        ///
        ///
             /////delete master /////

                public function delete_master($id_master) {

                $master = Master::findOrFail($id_master);
           $master->delete();
           return redirect()->back()->with('message','Mastère supprimer avec succeé');
                }
            /////end delete master /////
            ///
            ///
            ///

            public function master_recherche() {
               $rech_master=Master::where('type','recherche')->get();
                return view('FrontEnd.Master.master_rech',['rech_master'=>$rech_master]);


            }
            public function master_professionnel() {
                $pro_master=Master::where('type','professionnel')->get();
                return view('FrontEnd.Master.master_pro',['pro_master'=>$pro_master]);


            }
            public function master_Co_construit() {
                $co_master=Master::where('type','co-construit')->get();
                return view('FrontEnd.Master.co_construit',['co_master'=>$co_master]);


            }

            public function config_date_page($id_master) {
                $date= DB::table("date_inscrit")
                  ->where("date_inscrit.master_id", $id_master)
                    ->count();
                $m=Master::where("id",$id_master)->get()->first();

                $s=DB::table("Date_inscrit")
                    ->join("masters","masters.id","Date_inscrit.master_id")
                    ->join("anneuniversitaires","anneuniversitaires.id","Date_inscrit.id_a")
                    ->select("Date_inscrit.date_debut","Date_inscrit.date_fin","anneuniversitaires.Annee")
                    ->where("Date_inscrit.master_id",$id_master)
                    ->get()->first();
             if ($s==null) {
                 return view("admin_folder.managemaster.configure_date", ['id_m' => $id_master, 'date' => $date,"m"=>$m]);
             }else
                 return view("admin_folder.managemaster.configure_date", ['id_m' => $id_master, 'date' => $date,"s"=>$s,"m"=>$m]);

            }
            public function configurer_date(Request $request) {

                $rules=    [
                    'annee' => 'required',
                    'date_debut' => 'required',
                    'date_fin' => 'required',
                ];

                $messages=       [
                    'annee.required' =>'Ce champ est obligatoire',
                    'date_debut.required' =>'Ce champ est obligatoire',
                    'date_fin.required' =>'Ce champ est obligatoire',


                ];


                $validator = Validator::make($request->all(),$rules,$messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInputs($request->all());
                }

                $id=\request('id');
                $annee=\request('annee');
                $debut=\request('date_debut');
                $fin=\request('date_fin');
        $master=Master::find($id);
        if($master==null){
            return redirect()->back()->with('message',"Mastère n'existe pas !");
                         }
        else
            {


                  $anneeuniv =new Anneuniversitaire();
                  $anneeuniv->Annee = $annee;
                  $anneeuniv->save();
                  $date_inscrit = new Date_inscrit();
                  $date_inscrit->id_a = $anneeuniv->id;
                  $date_inscrit->master_id = $id;
                  $date_inscrit->date_debut = $debut;
                  $date_inscrit->date_fin = $fin;
                  $date_inscrit->save();
                  return redirect()->back()->with('m', "Date attribuer avec succée !");
              }




        }






            public function upt_configurer_date(Request $request) {

                $rules=    [
                    'annee' => 'required',
                    'date_debut' => 'required',
                    'date_fin' => 'required',
                ];

                $messages=       [
                    'annee.required' =>'Ce champ est obligatoire',
                    'date_debut.required' =>'Ce champ est obligatoire',
                    'date_fin.required' =>'Ce champ est obligatoire',


                ];


                $validator = Validator::make($request->all(),$rules,$messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInputs($request->all());
                }

                $id=\request('id');
                $annee=\request('annee');
                $debut=\request('date_debut');
                $fin=\request('date_fin');
                $master=Master::find($id);
                if($master==null){
                    return redirect()->back()->with('message',"Mastère n'existe pas !");

                }
                else
                { $anneeuni =DB::table("Date_inscrit")
                    ->join("masters","masters.id","Date_inscrit.master_id")
                    ->join("anneuniversitaires","anneuniversitaires.id","Date_inscrit.id_a")
                    ->select("anneuniversitaires.Annee","anneuniversitaires.id")
                    ->where("Date_inscrit.master_id",$id)
                    ->update(['anneuniversitaires.Annee' => $annee]);
                    $anneeuniv =DB::table("Date_inscrit")
                        ->join("masters","masters.id","Date_inscrit.master_id")
                        ->join("anneuniversitaires","anneuniversitaires.id","Date_inscrit.id_a")
                        ->select("anneuniversitaires.id")
                        ->where("Date_inscrit.master_id",$id)
                 ->get()->first();
                        $date_inscrit = Date_inscrit::where("master_id",$id)->get()->first();
                        $date_inscrit->id_a = $anneeuniv->id;
                        $date_inscrit->master_id = $id;
                        $date_inscrit->date_debut = $debut;
                        $date_inscrit->date_fin = $fin;
                        $date_inscrit->save();
                        return redirect()->back()->with('m', "Date attribuer avec succée !");



                    }



            }
        }
