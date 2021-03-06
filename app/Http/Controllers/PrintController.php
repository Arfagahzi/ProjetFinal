<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function print_teacher($id_m)
    {
        $teachers = DB::table("users")->join("teachers", "users.id", "teachers.user_id")
            -> join("affecter_ens", "teachers.id", "affecter_ens.id_enseignant")
            ->select("users.name", "users.email","users.last_name", "users.phone", "teachers.grade", "teachers.id")->
            where("affecter_ens.master_id", $id_m)
            ->get();
        $master=Master::select("title")->where("id",$id_m)->get()->first();

        $output='
        <title>  '.$master->title.'  </title>
                <style>
                .container{
                margin-top:20px;
                 }
                .img-1{
                width: 100px;
                  margin-left:150px;

                }

                .img-3{
                 width:150px;
               margin-right: 280px
                }
                </style>
       <div class="container">
       <img class="img-3" src="data:image/png;base64,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" alt="">
<img class="img-1" src="data:image/jpeg;base64,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" alt="">
</div>
<br>

<h3 align="center">Liste des enssignants pour la master '.$master->title.' </h3>
     <table width="92%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Nom</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Pr??nom</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Telephone</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Grade</th>

   </tr>
     ';
        foreach($teachers as $customer)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->last_name.'</td>
          <td style="border: 1px solid; padding:12px;">'.$customer->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->phone.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->grade.'</td>


      </tr>




      ';
        }
        $output .= '</table>';
        $output .='      <h5>Administration</h5>'
        ;


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->stream();
    }

    public function imprimer_recu()
    {
       return view("student.imprimer_recu");
    }
    public function imprimer_r($inscrit_id)
    {    $student=DB::table("users")
        ->join("students","users.id","students.user_id")
        ->join("inscriptions","students.id","inscriptions.id_student")
        ->join("masters","inscriptions.master_id","masters.id")
        ->where("students.user_id",auth()->user()->id)
        ->where("inscriptions.id",$inscrit_id)
        ->where("inscriptions.annuler","non")
        ->get()->first();
        $ldate = date('Y-m-d H:i:s');

$m=Master::where("id",$student->master_id)->get()->first();
$d=Dossier::where("inscrit_id",$inscrit_id)->get()->first();

        $output='

   <!DOCTYPE html>
<html>
<head>
<title>'.$student->name.'</title>
<style>

p.groove {
border-style: groove;
height: 1000px;
margin-top: -25px;
}
table {
  border-collapse: collapse;
  width: 95%;
  margin-top: 150px;
  margin-left: 55px;

}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
.dd  {
margin-left: 550px;
margin-top: -1000px;
}
.isg{
margin-left: 15px;
}
.img{
margin-left: 15px;
margin-top: -100px;

}
.date {
margin-left: 550px;
}
.choix{
margin-left: 400px;

}
</style>
</head>
<body>

<p class="groove">
<div class="dd">
Dossier N?? '.$inscrit_id.'
</div>
<div class="date">
Date : '.$ldate.'
</div>
<div class="img">
<img src="http://www.isgs.rnu.tn/images/logo.png" >
</div>
<br>
<div class="isg">
Institut sup??rieur de gestion de sousse
</div>
<div class="choix">
Choix de Mast??re :'.$m->title.'
</div>
</p>

<table>
  <tr>
  <td>Cin :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$student->cin.'</td>
  </tr>
  <tr>
  <td>Nom :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$student->name.'</td>
  </tr>
  <tr>
  <td>Pr??nom :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$student->last_name.'</td>
  </tr>
    <tr>
  <td>Date Naissance :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$student->birthday.'</td>
  </tr>
    <tr>
  <td>Lieu de naissance : :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$student->birth_adresse.'</td>
  </tr>
    <tr>
  <td>Statut :</td>
  <td hidden></td>
  <td hidden></td>
  <td>Etudiant(e)</td>
  </tr>
    <tr>
  <td>Num??ro du portable :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$student->phone.'</td>
  </tr>
    <tr>
  <td>Nature du baccalaur??at :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->bac.'</td>
  </tr>
    <tr>
  <td>Ann??e du baccalaur??at :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->Annee_bac.'</td>
  </tr>
    <tr>
  <td>Session du bac :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->session_bac.'</td>
  </tr>
    <tr>
  <td>Moyenne du bac : </td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->moyenne_bac.'</td>
  </tr>
    <tr>
  <td>Nature du dipl??me : </td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->nature_diplome.'</td>
  </tr>
    <tr>
  <td>??tablissement : </td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->nom_diplome.'</td>
  </tr>
    <tr>
  <td>Sp??cialit?? :</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->nom_diplome.'</td>
  </tr>
    <tr>
  <td>Ann??e d obtention:</td>
  <td hidden></td>
  <td hidden></td>
  <td>'.$d->date_diplome.'</td>
  </tr>



</table>





</body>
</html>


     ';


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->stream();

    }


}
