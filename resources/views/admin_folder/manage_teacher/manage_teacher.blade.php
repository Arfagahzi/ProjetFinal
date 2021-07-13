@extends('layouts.layouts_profile_admin.master')
@section('contenu')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--        Style--}}
        <link rel="stylesheet" href="/css/manage_teacher.css">
{{--        Style--}}
    </head>


    <a href=" {{route("add_teacher_page")}}"><button type="button" class="btn btn-success">Ajouter Enseignant</button></a>

    <hr>
    @if(Session::has('success'))
                <div  class="alert alert-danger" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
    @endif
    <div class="container">
        <h3 class="pb-3 mb-4 font-italic border-bottom gg">
            Liste Des Mastères
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
