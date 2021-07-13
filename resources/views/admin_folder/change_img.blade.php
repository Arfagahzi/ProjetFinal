@extends('layouts.layouts_profile_admin.master')

@section('contenu')

    {{-- Style--}}
    <link rel="stylesheet" href="/css/add_master.css">
    {{-- Style--}}

    <a href="{{route('manage_master')}}"><button type="button" class="btn btn-primary">Retour</button></a>
    <hr>


    <div class="container">
        <div class="title">Ajouter une  Mastère</div>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

        <div class="content">
            <form method="post" action='{{route('add_master_page')}}' enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Mastère :</span>
                        <input type="text" id="master" name="title" value="" required>
                        @error('title')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-box">
                        <label for="disabledSelect" class="form-label">type de Mastère : </label>
                        <select id="select" name="type"  class="form-select">
                            <option value="Professionnel">Professionel</option>
                            <option value="Recherche">Recherche</option>
                            <option value="co-construit">Co-Construit</option>
                        </select>
                        @error('type')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Photo Mastère :</span>
                        <input id="image" type="file" class="form-control"
                               name="image"  required autocomplete="email" autofocus>
                        @error('image')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Détails sur la Mastère :</span>
                        <textarea id="detail" name="detail" rows="4" cols="50"  >
                                </textarea>
                        @error('detail')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Ajouter Mastère">
                </div>
            </form>
        </div>
    </div>



@endsection
