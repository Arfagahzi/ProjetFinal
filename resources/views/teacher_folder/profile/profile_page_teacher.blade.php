@extends('layouts.layouts_profile_teacher.modif_profile_teacher')

@section('contenu')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/upd_profile_teacher.css">

    <div class="container emp-profile" style=" margin-top: -101px;
">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="avatar" width="300px" height="300px">

                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{Auth::user()->name}} {{Auth::user()->last_name}}

                    </h5>
                    <h6>
                        Enseignant(e)
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nom</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth::user()->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Prénom</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth::user()->last_name}} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Téléphone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth::user()->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date naissance </label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth::user()->birthday}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Adresse local</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth::user()->adresse}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ville</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth::user()->city}}</p>
                            </div>
                        </div>
                        <a href="{{route('update_profile_teacher_page')}}" class="btn btn-secondary">Modifier Profile</a>
                        <a href="{{route('show_master')}}" class="btn btn-primary">Retour</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
