
@extends('layouts.layouts_profile_admin.master')
@section('contenu')


                        {{--Style--}}
            <link rel="stylesheet" href="/css/update_etab.css">
                        {{--Style--}}

                        <div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="title">Modifier Etablissement </div>
    <br>
    <div class="content">
        <form action="{{route('update_etab_page')}}" method="post">
            {{csrf_field()}}
            <div class="mb-3">
                <input type="hidden" class="form-control" id="master" name="id" value="{{$etablissements->id}}">
                <label for="disabledTextInput" class="form-label">Etablissement </label>
                <input type="text"  class="form-control" name="etablissement" value="{{$etablissements->etablissement}}">
                @error('etablissement')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Universite </label>
                <select id="select" name="universite" class="form-select">
                    <option value="{{$etablissements->universite}}">{{$etablissements->universite}}</option>
                @foreach ($universites as $universite)
                        <option value="{{$universite->universite}}">{{$universite->universite}}</option>
                    @endforeach
                </select>
            </div>
            <div class="button">
                <input type="submit" value="Modifier">
            </div>
        </form>
    </div>
</div>

@endsection
