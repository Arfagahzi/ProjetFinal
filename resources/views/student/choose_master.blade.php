@extends('layouts.layout_choisirmaster.master_choisirmater')
@section('contenu')
    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="/css/choose_master.css">
</head>
<body>

<center>

    @if(Session::has('error'))
        <div>
            {{Session::get('error')}}
        </div>
    @endif
    <h3>Selectioner Votre Master : </h3>
        <br>

        <form action="{{route('choisir_master')}}" method="post">
        @csrf
        <h6>Type Master :</h6>

        <select  name="type" style="width: 400px" class="type_master form-select" id="prod_cat_id" >

            <option value="0" disabled="true" selected="true">-séléctionner votre type de Master-</option>
            <option value="recherche">Recherche</option>
            <option value="professionnel">Professionnelle</option>

        </select>
        @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <br>
        <h6>Master: </h6>
        <select style="width: 400px" class="master form-select" name="master">
            <option value="0" disabled="true" selected="true">-séléctionner votre  Master-</option>
        </select>
        <br>
        <div class="button">
        <button type="submit" class="btn btn-success">Valider</button>
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

</body>
</html>
@endsection
