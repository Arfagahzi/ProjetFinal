@extends('layouts.layouts_profile_admin.master')

@section('contenu')


    {{-- Style--}}
    <link rel="stylesheet" href="/css/add_master.css">
    {{-- Style--}}

    <a href="{{route('manage_master')}}"><button type="button" class="btn btn-primary">Retour</button></a>
    <hr>


    <div class="container">
        <div class="title">Date d'Ouverture de Mastère : {{$m->title}} </div>
        <div class="content">

            @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif

            @if(Session::has('m'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('m')}}
                </div>
            @endif
            @if(Session::has('a'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('a')}}
                    Voulez vous <a   href="">  modifier la date   </a>
                </div>
            @endif

                @if($date==0)
                    <form method="post" action="{{route('configurer_date')}}">
                    @csrf
                <div class="user-details">
                    <input type="hidden" name="id" value="{{$id_m}}">
                    <div class="input-box">
                        <span class="details">Année universitaire</span>
                        <input type="text" name="annee">
                        @error('annee')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Date de Début:</span>

                        <input type="date" id="start" name="date_debut"
                               value="2018-07-22"
                               min="2010-01-01" max="3000-12-31">
                        @error('date_debut')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Date Fin:</span>

                        <input type="date" id="start" name="date_fin"
                               value="2018-07-22"
                               min="2010-01-01" max="3000-12-31">
                        @error('date_fin')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>
                <div class="button">
                    <input type="submit" value="Enregistrer">
                </div>
            </form>
                @else
                    <form method="post" action="{{route('upt_configurer_date')}}">
                        @csrf
                        <div class="user-details">
                            <input type="hidden" name="id" value="{{$id_m}}">
                            <div class="input-box">
                                <span class="details">Année universitaire</span>
                                <input type="text" name="annee">
                                @error('annee')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Date de Début:</span>

                                <input type="date" id="start" name="date_debut"
                                       value="2018-07-22"
                                       min="2010-01-01" max="3000-12-31">
                                @error('date_debut')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">Date Fin:</span>

                                <input type="date" id="start" name="date_fin"
                                       value="2018-07-22"
                                       min="2010-01-01" max="3000-12-31">
                                @error('date_fin')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="button">
                            <input type="submit" value="Enregistrer">
                        </div>
                    </form>
                @endif
        </div>
    </div>




@endsection

