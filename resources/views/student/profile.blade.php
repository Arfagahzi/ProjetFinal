
@extends('layouts.layouts_profile.master')

@section('contenu')
    <!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--        Style--}}
    <link rel="stylesheet" href="/css/profile_student.css">
    {{--        Style--}}

</head>
<body>
<div class="container">
    <div class="title">Votre profile</div>
    <div class="content">
        <form action="{{route('student_profile_update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nom</span>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                           name="last_name" value="{{ $user->last_name }}" required autofocus>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Prénom</span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ $user->name }}" required autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Telephone</span>
                    <input id="phone" type="text" class="form-control @error('') is-invalid @enderror"
                           name="phone" value="{{ $user->phone }}" required  autofocus>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Date Naissance</span>
                    <div class="col-md-12 form-group">

                        <input type="date" id="start" value="2000-01-01" min="1980-01-01" max="2021-12-31"
                               style=" width: inherit;"  id="birthday" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $user->birthday }}" required  autofocus>
                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-box">
                    <span class="details">Lieu De Naissance </span>
                    <input id="birth_adresse" type="text" class="form-control @error('birth_adresse') is-invalid @enderror"
                           name="birth_adresse" value="{{ $user->birth_adresse }}" required  autofocus>
                    @error('birth_adresse')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Adresse locale</span>
                    <textarea id="adresse"  class="form-control @error('adresse') is-invalid @enderror"
                              name="adresse"  rows="2" required  >{{ $user->adresse }}</textarea>
                    @error('adresse')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Region</span>
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                           name="city" value="{{ $user->city }}" required autocomplete="email" autofocus>
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Code postal</span>
                    <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror"
                           name="postal_code" value="{{ $user->postal_code }}" required autocomplete="email" autofocus>
                    @error('postal_code')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Photo de Profile</span>
                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" *
                           name="avatar" value="{{ $user->avatar }}" required autocomplete="email" autofocus>
                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="input-box">
                    <span class="details">Sexe</span>
                    <div class="col-md-12 form-group">

                        <select id="select" name="sexe" class="form-control form-select" style="margin-top: 1px">

                            <option value="h">Femme</option>
                            <option value="f">Homme</option>
                        </select>
                        @error('sexe')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="button">
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </div>
</div>

</body>
</html>
@endsection
