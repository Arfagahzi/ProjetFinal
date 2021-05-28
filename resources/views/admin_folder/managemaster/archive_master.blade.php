
@extends('layouts.layouts_profile_admin.master')

@section('contenu')

    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--        Style--}}
    <link rel="stylesheet" href="/css/gerer_master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<a href="{{route('add_master')}}">
    <button type="button" class="btn btn-success">Ajouter Master</button>
</a>
<a href="{{route('manage_master')}}">
    <button type="button" class="btn btn-info">Retour</button>
</a>
<hr>
<div class="wrapper">
    <h1> Liste Des Masters Archivé </h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Master</th>
                <th scope="col">Type master</th>
                <th scope="col">Detail sur la master</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>


            <tr>

                @foreach ($masters as $master)
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $master->title }}</td>
                    <td>{{ $master->type }}</td>
                    <td>{{ $master->detail }}</td>
                    <td>
                        <a href="">
                            <button type="button" class="btn btn-info">Rendre actif</button>
                        </a>
                    </td>
                @endforeach
            </tr>

            </tbody>
        </table>


</div>


@endsection
