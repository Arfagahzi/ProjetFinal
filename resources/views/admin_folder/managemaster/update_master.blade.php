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
    <link rel="stylesheet" href="/css/update_master.css">
    {{--        Style--}}

</head>
<body>
<a href="{{route('manage_master')}}"><button type="button" class="btn btn-primary">Retour</button></a>
<a href="{{route('add_master')}}"><button type="button" class="btn btn-success">Ajouter Master</button></a>
<hr>
<div class="container">
    <div class="title">Modifier Master</div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
</div>
<div class="content">
    <form method="post" action='{{route('update_master_page')}}'>
        {{csrf_field()}}
        <input type="hidden" class="form-control" id="master" name="id" value="{{$masters->id}}">

        <div class="user-details">
            <div class="input-box">
                <span class="details">Master</span>
                <input type="text" id="master" name="title" value="{{$masters->title}}" required>
                @error('title')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="input-box">
                <label for="disabledSelect" class="form-label">Type de Master</label>
                <select id="select" name="type" value="{{$masters->type}}" class="form-select">
                    <option value="{{$masters->type}}">{{$masters->type}} </option>
                    <option value="professionnel">Professionel</option>
                    <option value="recherche">Recherche</option>
                </select>
                @error('type_m')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="input-box">
                <span class="details">Détail sur la master</span>
                <textarea id="detail" name="detail" rows="4" cols="50"  >{{$masters->detail}} </textarea>
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Modifier">
        </div>
    </form>
</div>
</div>
</body>
</html>
@endsection
