<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatureController extends Controller
{
    public function annuler_candidature($inscrit_id) {

        $master = Inscription::findOrFail($inscrit_id);
        $master->annuler="oui";
        $master->save();
        return redirect()->back()->with('success','Candidature annuler avec succeé !');
    }
    public function details_page($inscrit_id) {
        $student=DB::table("users")
            ->join("students","users.id","students.user_id")
            ->join("inscriptions","students.id","inscriptions.id_student")
            ->select("inscriptions.id","users.name","users.last_name","users.email","users.avatar")

            ->where("inscriptions.id",$inscrit_id)

            ->where("inscriptions.annuler","non")
            ->get()->first();

        return view("student.details_candidature" ,[
        "student"=>$student

            ]);
    }
}
