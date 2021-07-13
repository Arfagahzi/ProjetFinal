@extends('layouts.layouts_profile_admin.master')
@section('contenu')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{--        Style--}}
        <link rel="stylesheet" href="/css/profile_admin.css">
        {{--        Style--}}
    </head>


    <div class="container">
        <h3 class="pb-3 mb-4 font-italic border-bottom gg">
            Liste Des Etudiants Par Mastères
        </h3>
        <div class="row">
            @foreach($masters as $master)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">

                            <a href="{{"teacher_master/". $master->id}}"> <strong class="d-inline-block mb-2 text-primary">{{$master->title}}</strong></a>
                            <h6 class="mb-0">
                                <span  class="text-dark" >type de mastère </span>
                            </h6>

                            <div class="mb-1 text-muted small type_m">{{$master->type}}</div>
                            <h6 class="mb-0">
                                <span  class="text-dark" >Détail</span>
                            </h6>
                            <p class="card-text mb-auto small">{{$master->detail}}<br/></p><br>
                            <a href="{{"teacher_master/". $master->id}}" class="btn btn-primary liste"> Accéeder au liste </a>
                        </div>

                        <img src="{{asset('/storage/images/'.$master->image)}}" alt="image" class="img">

                    </div>

                </div>

            @endforeach

        </div>



    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@endsection

{{--@extends('layouts.layouts_profile_admin.master')--}}

{{--@section('contenu')--}}


{{--    <!DOCTYPE html>--}}
{{--<html lang="en" dir="ltr">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <!---<title> Responsive Registration Form | CodingLab </title>--->--}}
{{--    <link rel="stylesheet" href="style.css">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    --}}{{-- Style--}}
{{--    <link rel="stylesheet" href="/css/profile_admin.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="wrapper">--}}
{{--    <h1> Liste Des Etudiants Inscrit </h1>--}}
{{--    <table class="table table-hover">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">Id</th>--}}
{{--            <th scope="col">Photo</th>--}}
{{--            <th scope="col">Nom</th>--}}
{{--            <th scope="col">Prénom</th>--}}
{{--            <th scope="col">Email</th>--}}
{{--            <th scope="col">Option</th>--}}



{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            @foreach($inscriptions as $insrit)--}}
{{--            <td>{{$i++}}</td>--}}

{{--            <th scope="row">--}}
{{--                <img src="{{asset('/storage/images/'.$insrit->avatar)}}" alt="avatar" width="50px" height="50px">--}}

{{--            </th>--}}
{{--            <td>{{$insrit->name}}</td>--}}
{{--            <td>{{$insrit->last_name}}</td>--}}
{{--            <td>{{$insrit->email}}</td>--}}

{{--                <td><a href="{{"consulter_detail/".$insrit->id}}" class="btn btn-primary">Détail</a></td>--}}
{{--            @endforeach--}}
{{--        </tr>--}}

{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}
{{--@endsection--}}
