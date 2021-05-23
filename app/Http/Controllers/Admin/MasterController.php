<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Master;
use Illuminate\Http\Request;
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
            'detail' => 'required',
        ];

        $messages=       [
            'title.required' =>'Ce champ est obligatoire',
            'title.unique'=>'Cet master existe déja',
            'type.required' =>'Ce champ est obligatoire',
            'detail.required' =>'Ce champ est obligatoire',


        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        $m=\request('title');
        $type_m=\request('type');
        $detail=\request('detail');

        $master=new Master();
        $master->title=$m;
        $master->type=$type_m;
        $master->detail=$detail;
        $master->save();

            Alert::success('Master ajouter avec succes', session('success_message'));

        return redirect()->back();
    }
    ////add master function//////

////show update master page//////
    public function Show_update_master_page($id_master)
    {

        $master= Master::find($id_master);
        if(!$master)
            return redirect()->back();

        $masters=Master::select('id','title','type','detail')->find($id_master);
        return view('admin_folder.managemaster.update_master',['masters'=>$masters]);
    }
    ///////update master///////
    public function update_master(Request $request) {
        $rules=    [
            'title' => 'required ',
            'type' => 'required',
            'detail' => 'required',
        ];

        $messages=       [
            'title.required' =>'Ce champ est obligatoire',
            'type.required' =>'Ce champ est obligatoire',
            'detail.required' =>'Ce champ est obligatoire',


        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        $id=\request('id');
        $m=\request('title');
        $type_m=\request('type');
        $detail=\request('detail');
        $master= Master::find($id);
        $master->title =$m;
        $master->type=$type_m;
        $master->detail=$detail;
        $master->save();

        return redirect()->back()->with(['success'=>'Master Modifier avec succes ']);
    }

     /////delete master /////

        public function delete_master($id_master) {
         //dd($id_master);
         $delete=Master::where('id',$id_master)->delete();
            if ($delete == 1) {
                            $success = true;
                            $message = "User deleted successfully";
                        } else {
                            $success = true;
                            $message = "User not found";
                        }
                        //  Return response
                        return response()->json([
                            'success' => $success,
                            'message' => $message,
                        ]);
        }
    /////end delete master /////
}
