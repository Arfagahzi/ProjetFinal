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
<a href="{{route('manage_teacher')}}"><button type="button" class="btn btn-primary">Retour</button></a>
<hr>
<div class="wrapper">
    <h1> Liste Des Enseignants au Master :  </h1>


    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Option</th>

        </tr>
        </thead>
        <tbody>
@foreach($teacher as $teachers)
    <tr>
        <th scope="col">{{$teachers->name}}</th>
        <th scope="col">{{$teachers->email}}</th>
        <th scope="col">{{$teachers->last_name}}</th>

    </tr>

@endforeach



        </tbody>
    </table>

</div>

</body>
</html>
@endsection
