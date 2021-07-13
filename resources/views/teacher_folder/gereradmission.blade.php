@extends('layouts.layouts_profile_teacher.master')

@section('contenu')


    {{--        Style--}}
    <link rel="stylesheet" href="/css/gerer_master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{--        Style--}}


    <div class="wrapper">
        <h1> Liste Des Etudiants en {{ $master->title}} </h1>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Université</th>
                    <th scope="col">Score</th>
                    <th scope="col">Option</th>

                </tr>
                </thead>
                <tbody>
@foreach($students as $t)
    <?php

    $conn = new mysqli("localhost", "root", "","isg_db");
    //$req0 = "select * from inscriptions where id={$t->id}";
   // dd($req0);
   // $result0 = mysqli_query($conn ,$req0);
   // $ligne0 = mysqli_fetch_array($result0, MYSQLI_BOTH);
   // $idetudiant = 0;
  //  while($ligne0 = mysqli_fetch_array($result0)){
  //      $idetudiant = $ligne0[1];
 //       }






    $req="select * from anneescolaires where annee=1 and inscrit_id= {$t->id}";
//dd($req);
    $result = mysqli_query($conn ,$req);


    $ligne = mysqli_fetch_array($result, MYSQLI_BOTH);


    $score =  $ligne[2];
  //  dd($ligne[2]);





    $req="select * from anneescolaires where annee=2 and inscrit_id= {$t->id}";
    //dd($req);
    $result = mysqli_query($conn ,$req);


    $ligne = mysqli_fetch_array($result, MYSQLI_BOTH);

    $score = $score + 1.5 * $ligne[2];
    //  dd($ligne[2]);

    $req="select * from anneescolaires where annee=3 and inscrit_id= {$t->id}";
    //dd($req);
    $result = mysqli_query($conn ,$req);


    $ligne = mysqli_fetch_array($result, MYSQLI_BOTH);

    $score = $score + 1.5 * $ligne[2];
    //  dd($ligne[2]);
  // session_start();
  // session(["score"=>$score]);
    $_SESSION["score"] = $score;
//dd('htgh');












    ?>

    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <img src="{{asset('/storage/images/'.$t->avatar)}}" alt="avatar" width="50px" height="50px">
                        </td>
                        <td>{{$t->name}}</td>
                        <td>{{$t->last_name}}</td>
                        <td>{{$t->email}}</td>
                        <td>sd</td>
                        <td><?php echo($_SESSION["score"]); ?></td>
                        <td>
                            <a href="" class="btn btn-success">Admis</a>


                            <a href="" class="btn btn-secondary">Liste Attente</a>
                            <a href="javascript:" rel="" rel1="delete_master" class="btn btn-danger btn-mini deleteRecord">Réfuser</a>
                            <a href="{{"details_page/". $t->id}}" class="btn btn-primary">Détail</a>

                        </td>

                </tr>
@endforeach
                </tbody>
            </table>
        </form>
    </div>

@endsection
