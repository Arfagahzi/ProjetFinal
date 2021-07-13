@extends('layouts.layouts_profile_admin.master')

@section('contenu')

    {{-- Style--}}
    <link rel="stylesheet" href="/css/change_pass.css">
    {{-- Style--}}

    <a href="{{route('manage_master')}}"><button type="button" class="btn btn-primary">Retour</button></a>
    <hr>


    <div class="container">
        <div class="title">Changement de mot de passe</div>


        <div class="content">
            <form action="{{route('change_pass')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Changer Mot de passe</span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Confirmer Mot de passe</span>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

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
        </div>
    </div>



@endsection
