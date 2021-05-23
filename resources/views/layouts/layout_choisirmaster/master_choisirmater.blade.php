<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{--    Style--}}
    <link rel="stylesheet" href="/css/layout-choose-master.css">
</head>
<body>
<input type="checkbox" id="nav-toggle" style="visibility: hidden">
<div class="sidebar">
    <div class="sidebar-brand">

    </div>




    <div class="sidebar-menu">

        <h4> Votre Demande de Condidature Selon Master</h4>
        <table class="table table-striped">
            <thead>

            <tr  class="table-primary">
                <th>ID</th>
                <th>Nom</th>
                <th>Type Master</th>
                <th class="text-center">Master</th>
            </tr>
            </thead>
            @foreach ($students as $student)
                <tr>
                    <td scope="row " class="table-light" >{{ $i++ }}</td>
                    <td  class="table-light">{{ $student->name }}</td>
                    <td  class="table-light"> <a  style="color: #222222" href={{"/student/student_profile/".$student->id}}>{{ $student->title }}</a></td>

                    <td  class="table-light">{{ $student->type }}</td>
                </tr>
            @endforeach

        </table>

    </div>






</div>

<div class="main-content">

    <main>
        @yield('contenu')
    </main>
</div>
<script>
    function menuToogle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
    }
</script>
</body>
</html>

