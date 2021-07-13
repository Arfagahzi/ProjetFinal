

@extends('layouts.layouts_profile_admin.master')

@section('contenu')


        <link rel="stylesheet" href="style.css">
        {{--        Style--}}
        <link rel="stylesheet" href="/css/add_teacher.css">
        {{--        Style--}}

    <a href="{{route('manage_teacher')}}"><button type="button" class="btn btn-primary">Retour</button></a>
    <hr>
    <div class="container">
        <div class="title">Ajouter un Enseignant</div>
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
            @if(Session::has('khawla'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('khawla')}}
            </div>
        @endif

        <div class="content">
            <form action="{{route("add_teacher")}}" method="post">
              @csrf
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Nom</span>
                        <input type="text" name="nom" placeholder="Insérer  Nom" required>
                        @error('nom')
                        <li>  <small class="form-text text-danger">{{$message}}</small></li>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Prenom</span>
                        <input type="text"  name="prenom"  placeholder="Insérer  Prenom" required>
                        @error('prenom')
                        <li>  <small class="form-text text-danger">{{$message}}</small></li>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" placeholder="Insérer  Adresse" required>
                        @error('email')
                        <li>  <small class="form-text text-danger">{{$message}}</small></li>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Telephne</span>
                        <input type="text" name="telephone"  placeholder=" Insérer Numéro de Telephone" required>
                        @error('telephone')
                        <li>  <small class="form-text text-danger">{{$message}}</small></li>
                        @enderror
                    </div>
                    <div class="input-box">
                        <label for="disabledSelect" class="form-label">Il vas être le membre de jury de la master </label>
                        <select id="select" name="master" class="form-select">
                            @foreach ($masters as $master)
                                <option value="{{$master->title}}">{{$master->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="disabledSelect" class="form-label">Grade </label>
                        <select id="select" name="grade" class="form-select">
                                <option disabled >--Selectioner--</option>
                                <option value="president">Président</option>
                                <option value="directeur">Enseignant</option>
                                <option value="secretaire">Chef d'equipe</option>

                        </select>
                    </div>

                </div>
                <div class="button">
                    <input type="submit" value="Ajouter enseignant">
        </div>
            </form>
        </div>
    </div>
@endsection
