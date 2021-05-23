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
{{--    Style--}}
    <link rel="stylesheet" href="/css/teacher_master.css">
{{--    Style--}}
</head>
<body>
<a href="{{"print_teacher/".$t->master_id}}"><button type="button" class="btn btn-secondary">Imprimer Liste</button></a>
<a href="{{route('manage_teacher')}}"><button type="button" class="btn btn-primary">Retour</button></a>

<hr>
<div class="wrapper">
    <h1> Liste Des Enseignants au Master :  </h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Telephone</th>

        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <th scope="row">{{$teacher->name}}</th>
                <td>{{$teacher->email}}</td>
                <td> {{$teacher->phone}}</td>

            </tr>
        @endforeach



        </tbody>
    </table>

</div>

</body>
</html>
@endsection
