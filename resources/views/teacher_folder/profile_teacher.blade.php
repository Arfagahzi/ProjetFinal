@extends('layouts.layouts_profile_teacher.master')
@section('contenu')
    <link rel="stylesheet" href="/css/profile_teacher.css">

    <div class="container">
        <a href="{{route('critere_page')}}">
            <button type="button" class="btn btn-success">Ajouter Critere</button>
        </a>
        <hr>
        <div class="title">Bienvenu voud ete le responsable sur la mastere : <strong>{{$master->title}} </strong></div>
        <div class="content">

            

        </div>
    </div>

@endsection
