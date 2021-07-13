@extends('layouts.layouts_profile_admin.master')

@section('contenu')

    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--        Style--}}
    <link rel="stylesheet" href="/css/gerer_master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{--        Style--}}

    <a href="{{route('show_add_admin_page')}}">
        <button type="button" class="btn btn-success">Ajouter Admin</button>
    </a>
    <hr>
    <div class="wrapper">
        <h1> Liste Des Administrateurs  </h1>

        <form action="" method="post">
            @csrf
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Option</th>

                </tr>
                </thead>
                <tbody>

@foreach($admins as $a)
                <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            <img src="{{asset('/storage/images/'.$a->avatar)}}" alt="avatar" width="50px" height="50px">
                        </td>
                        <td>{{$a->name}}</td>
                        <td>{{$a->last_name}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->phone}}</td>

                        <td>
                            <button type="button" class="btn btn-danger" onclick="deleteConfirmation()">
                                Supprimer </button>
                        </td>
                </tr>
@endforeach
                </tbody>
            </table>
        </form>
    </div>


@endsection
