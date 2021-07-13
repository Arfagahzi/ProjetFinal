    @extends('layouts.layout_master')
    @section('contenu')
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link rel="stylesheet" href="/css/master_rech.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <div class="container">
            <h3 class="pb-3 mb-4 font-italic border-bottom gg">
                    Master Recherche
                </h3>
            <div class="row">
                @foreach($rech_master as $rech)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary"> {{$rech->title}}</strong>
                            <h6 class="mb-0">
                                <span  class="text-dark" >type de master</span>
                            </h6>

                            <div class="mb-1 text-muted small type_m">{{$rech->type}}</div>
                            <h6 class="mb-0">
                                <span  class="text-dark" >Détail</span>
                            </h6>
                            <p class="card-text mb-auto small">{{$rech->detail}}<br/></p>
                        </div>
                        <img src="{{asset('/storage/images/'.$rech->image)}}" alt="image" class="img">
                    </div>
                </div>
            @endforeach
            </div>



        </div>

    @endsection
    @section('js')
    @endsection
