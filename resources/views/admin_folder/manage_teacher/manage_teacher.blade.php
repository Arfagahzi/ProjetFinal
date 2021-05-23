@extends('layouts.layouts_profile_admin.master')
@section('contenu')
    <!DOCTYPE html>
    <!-- Created By CodingLab - www.codinglabweb.com -->
    <html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <!---<title> Responsive Registration Form | CodingLab </title>--->
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--        Style--}}
        <link rel="stylesheet" href="/css/manage_teacher.css">
{{--        Style--}}
    </head>
    <body>
    <a href=" {{route("add_teacher_page")}}"><button type="button" class="btn btn-success">Ajouter Enseignant</button></a>

    <hr>
    <div class="wrapper">
    <h1> Liste Des Masters </h1>
    </div>
    @if(Session::has('success'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif

    <div class="container">
        <div class="row">
            @foreach($masters as $master)
            <div class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div  class="entry-cover image-grid-cover has-image">
                    <a href="#" class="image-grid-clickbox"></a>
                    <a href="{{"teacher_master/". $master->id}}" class="cover-wrapper">{{$master->title}}</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
{{--     -}}
{{--            <a href=" "><span></span></a>--}}
{{--     --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </body>
    </html>
@endsection
