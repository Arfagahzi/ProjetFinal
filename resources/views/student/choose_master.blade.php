@extends('layouts.layout_choisirmaster.master_choisirmater')
@section('contenu')


    <link rel="stylesheet" href="/css/choose_master.css">

    <nav class="navbar navbar-light bg-primary">
    <span class="g">
        Bienvenu dans Votre Espace {{Auth::user()->name}} {{Auth::user()->last_name}}
    </span>
        <span class="decx"><i class="las la-sign-out-alt"> <a  class="dec" href="{{ route('logout') }}"  onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Déconnexion
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a></i></span>
    </nav>
<center>


    <h3>Selectioner Votre Master : </h3>
        <br>
{{--    @if(Session::has('success'))--}}
{{--        <div class="alert alert-success" role="alert">--}}
{{--            {{Session::get('success')}}--}}
{{--        </div>--}}
{{--    @endif--}}
    @if(Session::has('e'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('e')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
    @endif
        <form action="{{route('choisir_master')}}" method="post">
        @csrf
        <h6>Type Master :</h6>

        <select  name="type" style="width: 400px" class="type_master form-select" id="prod_cat_id" >

            <option value="0" disabled="true" selected="true"required>-séléctionner votre type de Master-</option>
            <option value="recherche">Recherche</option>
            <option value="professionnel">Professionnelle</option>
            <option value="Co-construit">Co-construit</option>


        </select>
        @error('type')
        <div class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <br>
        <h6>Master: </h6>
        <select style="width: 400px" class="master form-select" name="master">
            <option value="0" disabled="true" selected="true">-séléctionner votre  Master-</option>
        </select>
        <br>
        <div class="button">
        <button type="submit" class="btn btn-primary">Valider</button>
        </div>

    </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('change', '.type_master', function () {

                var type_m = $(this).val();
                var div = $(this).parent();

                var op = " ";

                $.ajax({
                    type: 'get',
                    url: '{{ route('findmaster') }}',
                    data: {'id': type_m},
                    success: function (data) {

                        op += '<option value="0" selected disabled>-Select-</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '" required name="master">' + data[i].title + '</option>';


                        }

                        div.find('.master').html(" ");
                        div.find('.master').append(op);
                    },
                    error: function () {

                    }
                });
            });
        });
    </script>

</center>

{{--    @include('sweetalert::alert')--}}

@endsection
