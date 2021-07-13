@extends('layouts.layouts_profile_admin.master')

@section('contenu')


    {{--        Style--}}
    <link rel="stylesheet" href="/css/gerer_master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{--        Style--}}

<a href="{{route('add_master')}}">
    <button type="button" class="btn btn-success">Ajouter Mastère</button>
</a>
<hr>
<div class="wrapper">
    <h1> Liste Des Mastères </h1>
    @if(Session::has('success'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <form action="" method="post">
        @csrf
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Photo</th>
                <th scope="col">Mastère</th>
                <th scope="col">Type Mastère</th>
                <th scope="col">Option</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                @foreach ($masters as $master)
                    <th scope="row">{{ $i++ }}</th>
                    <td> <img src="{{asset('/storage/images/'.$master->image)}}" alt="image" width="80px" height="50px" style="margin-bottom: 10px">
                    </td>
                    <td>{{ $master->title }}</td>
                    <td>{{ $master->type }}</td>
                    <td>
                        <a href="{{"config_date_page/".$master->id}}" class="btn btn-primary">
                            Configurer Date
                        </a>
                        <a href="{{"update_master/".$master->id}}" class="btn btn-secondary">
                            Modifer
                        </a>
                        <a href="javascript:" rel="{{$master->id}}" rel1="delete_master" class="btn btn-danger btn-mini deleteRecord">Supprimer</a>

                    </td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </form>
</div>

    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var delete_master=$(this).attr('rel1');
            swal({
                title:'Tu es sûr ?',
                text:"Tu ne pourras pas revenir en arrière!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Confirmer !',
                cancelButtonText:' annuler !',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+delete_master+"/"+id;
            });
        });
    </script>
@endsection
