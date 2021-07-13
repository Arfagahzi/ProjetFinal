@extends('layouts.layouts_profile_admin.master')

@section('contenu')


    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/update_master.css">



<a href="{{route('manage_master')}}"><button type="button" class="btn btn-primary">Retour</button></a>
<a href="{{route('add_master')}}"><button type="button" class="btn btn-success">Ajouter Master</button></a>
<hr>
<div class="container">
    <div class="title">Modifier Mastère </div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
    @endif
<div class="content">
    <form method="post" action='{{route('update_master_page')}}' enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" class="form-control" id="master" name="id" value="{{$masters->id}}">

        <div class="user-details">
            <div class="input-box">
                <span class="details">Mastère </span>
                <input type="text" id="master" name="title" value="{{$masters->title}}" required>
                @error('title')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="input-box">
                <label for="disabledSelect" class="form-label">Type de Mastère </label>
                <select id="select" name="type"   class="form-select">
                    <option value="{{$masters->type}}" disabled>{{$masters->type}}</option>
                    <option value="professionnel">Professionel</option>
                    <option value="recherche">Recherche</option>
                    <option value="co-construit">Co-construit</option>

                </select>
                @error('type')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="input-box">
                <span class="details">Photo Mastère :</span>
                <img src="{{asset('/storage/images/'.$masters->image)}}" alt="image" width="80px" height="50px" style="margin-bottom: 10px">
                <input id="image" type="file" class="form-control"
                       name="image">

            </div>
            <div class="input-box">
                <span class="details">Détail sur la Mastère </span>
                <textarea id="detail" name="detail" rows="4" cols="50" style="width: 336px">{{$masters->detail}} </textarea>
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Modifier">
        </div>
    </form>
</div>
</div>

@endsection
