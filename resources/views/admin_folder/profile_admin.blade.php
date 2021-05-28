

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
    {{-- Style--}}
    <link rel="stylesheet" href="/css/profile_admin.css">
</head>
<body>
<div class="wrapper">
    <h1> Liste Des Etudiants Inscrit </h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Photo</th>
            <th scope="col">Id</th>
            <th scope="col">Adresse</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Cin</th>


        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">
                <img style="border-radius: 50%" width="40px" height="40px"
                     src="https://scontent.ftun6-1.fna.fbcdn.net/v/t1.6435-9/118656129_3419295371448283_2009178697794331873_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=tSV8hU64WdcAX8p23Cs&_nc_ht=scontent.ftun6-1.fna&oh=24a0fbc1a861c3722cabee5c171cc3f2&oe=60B48CEC">
            </th>
            <td>1</td>
            <td>ghaziarfaa@gmail.com</td>
            <td>Arfa</td>
            <td>Ghazi</td>
            <td>06965552</td>
        </tr>
        <tr>
            <th scope="row">
                <img style="border-radius: 50%" width="40px" height="40px"
                     src="https://scontent.ftun6-1.fna.fbcdn.net/v/t1.6435-9/118656129_3419295371448283_2009178697794331873_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=tSV8hU64WdcAX8p23Cs&_nc_ht=scontent.ftun6-1.fna&oh=24a0fbc1a861c3722cabee5c171cc3f2&oe=60B48CEC">
            </th>
            <td>1</td>
            <td>ghaziarfaa@gmail.com</td>
            <td>Arfa</td>
            <td>Ghazi</td>
            <td>06965552</td>
        </tr>
        <tr>
            <th scope="row">
                <img style="border-radius: 50%" width="40px" height="40px"
                     src="https://scontent.ftun6-1.fna.fbcdn.net/v/t1.6435-9/118656129_3419295371448283_2009178697794331873_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=tSV8hU64WdcAX8p23Cs&_nc_ht=scontent.ftun6-1.fna&oh=24a0fbc1a861c3722cabee5c171cc3f2&oe=60B48CEC">
            </th>
            <td>1</td>
            <td>ghaziarfaa@gmail.com</td>
            <td>Arfa</td>
            <td>Ghazi</td>
            <td>06965552</td>
        </tr>

        </tbody>
    </table>
</div>

</body>
</html>
@endsection
