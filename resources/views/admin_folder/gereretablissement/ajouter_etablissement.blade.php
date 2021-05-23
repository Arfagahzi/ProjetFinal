
@extends('layouts.layouts_profile_admin.master')
@section('contenu')

    {{--        Style--}}
    <link rel="stylesheet" href="/css/Add_etab.css">
    {{--        Style--}}


<div class="container">

        <a href="{{route('manage_etablissement')}}"><button type="button" class="btn btn-primary">Retour</button></a>

        <hr>
    <div class="title">Ajouter Etablissement</div>
    <br>
    <div class="content">
        <form action="{{route('add_etablissement')}}" method="post">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Etablissement </label>
                <input type="text" class="form-control" name="etablissement" placeholder="Inserer Etablissement">

                @error('etablissement')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Universite </label>
                <select id="select" name="universite" class="form-select">
                @foreach ($universites as $universite)
                        <option value="{{$universite->universite}}">{{$universite->universite}}</option>
                    @endforeach
                </select>
            </div>


            <div class="button">
                <input type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>
@include('sweetalert::alert')

@endsection
