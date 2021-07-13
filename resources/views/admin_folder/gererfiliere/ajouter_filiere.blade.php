

{{--@endsection--}}
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
        <link rel="stylesheet" href="/css/ajouter_filiere.css">
            {{--        Style--}}
    </head>
    <body>
    <a href="{{route('manage_filiere')}}"><button type="button" class="btn btn-primary">Retour</button></a>
    <hr>
    <div class="container">
        <div class="title">Ajouter une Filiére</div>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
                <div class="content">
                    <form method="post" action='{{route('add_filiere')}}'>
                        {{csrf_field()}}

                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Filiére</span>
                                <input type="text"  name="filiere" required>
                                @error('filiere')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="input-box">
                                <label for="disabledSelect" class="form-label">Niveau</label>
                                <select id="select" name="niveau"  class="form-select">
                                    <option value="Premiere année">Premiere année</option>
                                    <option value="Deuxieme année">Deuxieme année</option>
                                    <option value="Troisieme année">Troisieme année</option>

                                </select>

                            </div>
                            <div class="input-box">
                                <label for="disabledSelect" class="form-label">Etablissement</label>
                                <select id="select" name="etablissement" value="{" class="form-select">
                                    @foreach ($etablissements as $etablissement)
                                        <option value="{{$etablissement->etablissement}}">{{$etablissement->etablissement}}</option>
                                    @endforeach
                                </select>

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
