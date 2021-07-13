@extends('layouts.layouts_profile_admin.master')

@section('contenu')

    <link rel="stylesheet" href="style.css">
    {{-- Style--}}
    <link rel="stylesheet" href="/css/add_master.css">
    {{-- Style--}}

    <a href="{{route('liste_admins')}}"><button type="button" class="btn btn-primary">Retour</button></a>
    <hr>
    <div class="container">
        <div class="title">Ajouter Admin</div>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

    <div class="content">
        <form method="post" action='{{route('add_admin')}}'>
            {{csrf_field()}}

            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nom</span>
                    <input type="text"  name="name" value="" required>
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="input-box">
                    <label for="disabledSelect" class="form-label">Prénom : </label>
                    <input type="text"  name="last_name" value="" required>

                    @error('last_name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Adresse Email :</span>
                    <input type="text"  name="email" value="" required>

                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="details">Numéro Téléphone :</span>
                    <input type="text"  name="phone" value="" required>

                    @error('phone')
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

@endsection
