
@extends('layouts.layouts_profile.master')

@section('contenu')
    <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--        Style--}}
    <link rel="stylesheet" href="/css/profile_student.css">
    {{--        Style--}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>

<body>
<div class="container">
    <div class="title">Changement Mot de passe</div>
    <div class="content">
        <form action="{{route('changer_mot_de_passe')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Changer Mot de passe</span>
                    <input id="last_name" type="text" class="form-control @error('password') is-invalid @enderror"
                           name="password"  required autofocus>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="details">Confirmer Mot de passe</span>
                    <input id="password_confirmation" type="text" class="form-control @error('password_confirmation') is-invalid @enderror"
                           name="password_confirmation"  required autofocus>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="button">
                <input type="submit" value="Changer Mot de passe">
            </div>
        </form>
        <div class="alert alert-info" style="display: none;"></div>

    </div>
</div>

</body>
</html>
@endsection

{{--<form method="post" action="{{route('changer_mot_de_passe')}}">--}}
{{--    @csrf--}}
{{--    @if(Session::has('success'))--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    {{Session::get('success')}}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--    <input type="text" name="password">--}}
{{--    <input type="text" name="password_confirmation">--}}
{{--    <input type="submit" value="Changer Mot de passe ">--}}

{{--</form>--}}
