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
    {{-- Style--}}
    <link rel="stylesheet" href="/css/add_master.css">
    {{-- Style--}}
</head>
<body>
<a href="{{route('manage_master')}}"><button type="button" class="btn btn-primary">Retour</button></a>
<hr>
<div class="container">
    <div class="title">Ajouter une  Master</div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
</div>
<div class="content">
    <form method="post" action='{{route('add_master_page')}}'>
        {{csrf_field()}}

        <div class="user-details">
            <div class="input-box">
                <span class="details">Master</span>
                <input type="text" id="master" name="title" value="" required>
                @error('title')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="input-box">
                <label for="disabledSelect" class="form-label">type de Master </label>
                <select id="select" name="type"  class="form-select">
                    <option value="Professionnel">Professionel</option>
                    <option value="Recherche">Recherche</option>
                </select>
                @error('type')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="input-box">
                <span class="details">Détails sur la Master </span>
                <textarea id="detail" name="detail" rows="4" cols="50"  >
                    </textarea>
                @error('detail')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Ajouter">
        </div>
    </form>
</div>
</div>
</body>
</html>
@endsection
