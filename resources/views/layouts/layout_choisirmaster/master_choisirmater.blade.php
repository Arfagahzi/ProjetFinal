<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ISG Sousse</title>
    <link rel="icon" type="image/png" href="https://media-exp1.licdn.com/dms/image/C4E0BAQE3tYBbedpBuw/company-logo_200_200/0/1526295483398?e=2159024400&v=beta&t=8p4b1f4rN4VlzsOljoeVjejZ_4Za0QPX5ekrFX8r7ls" />    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout-choose-master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>


<footer>
    <p>
        Created  <i class="fa fa-heart"></i> by
        <a target="_blank" href="https://florin-pop.com">Ghazi arfa & khawla Khiari</a>

    </p>
</footer>
<div class="main-content">

    <main>
        @yield('contenu')
    </main>
</div>
<br>
@if ($s == 0)
  <div class="msg">
      {{$message}}
  </div>
      @else
<div class="row">
    <h1 class="text-center">
        Votre Demande de Condidature Selon Master</h1>
    @foreach ($students as $student)

        <div class="col-sm">
            <div class="pricing-box-container ">
                <div class="pricing-box pricing-box-bg-image text-center">
                    <h5>Dossier N°{{ $i++ }}</h5>
                    <p class="price"><sub>Mastère\</sub>{{ $student->title }}</p>
                    <ul class="features-list">
                        <li> <strong>Nom :</strong> {{ $student->name }}</li>
                        <li><strong>Prénom :</strong> {{ $student->last_name }}</li>
                        <li><strong>Type :</strong> {{ $student->type }}</li>
                    </ul>
                    <a href="{{"/student/student_profile/".$student->id}}"> <button  class="btn-primary" >Compléter votre Dossier</button></a>
                    <a href="javascript:" rel="{{$student->id}}" rel1="annuler_candidature" class="btn btn-primary btn-mini deleteRecord">Annuler</a>

                </div>
            </div>
        </div>
    @endforeach
</div>
@endif
<script>
    function menuToogle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
    }
</script>
<script>
    $(".deleteRecord").click(function () {
        var id=$(this).attr('rel');
        var annuler_candidature=$(this).attr('rel1');
        swal({
            title:'Tu es sûr ?',
            text:"Tu ne pourras pas revenir en arrière!",
            type:'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui, efface-le !',
            cancelButtonText:'Non, annulez !',
            confirmButtonClass:'btn btn-success',
            cancelButtonClass:'btn btn-danger',
            buttonsStyling:false,
            reverseButtons:true
        },function () {
            window.location.href="/student/"+annuler_candidature+"/"+id;
        });
    });
</script>

</body>
</html>
