
@extends('layouts.layouts_profile_admin.master')

@section('contenu')

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="/css/gerer_master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{--        Style--}}

<a href="{{route('add_master')}}">
    <button type="button" class="btn btn-success">Ajouter Master</button>
</a>
<a href="{{route('archive_master')}}">
    <button type="button" class="btn btn-success">Consulter l'archive des master</button>
</a>
<hr>
<div class="wrapper">
    <h1> Liste Des Masters </h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <form action="" method="post">
        @csrf
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
                        <a href="{{"update_master/".$master->id}}">
                            <button type="button" class="btn btn-info">Modifer</button>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="deleteConfirmation({{$master->id}})">
                            Mettre en archive </button>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <script type="text/javascript">
            function deleteConfirmation(id) {
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(isConfirm) {
                    console.log('isConfirm value => '+ isConfirm)
                        if (isConfirm ) {
                            console.log('isConfirm value  yes => '+ isConfirm)

                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'POST',
                                url: "{{route('delete_master')}}/" + id,
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (results) {
                                    if (results.success === true) {
                                        swal("Done!", results.message, "success");
                                    } else {
                                        swal("Error!", results.message, "error");
                                    }
                                }
                            });
                        } else {
                            e.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })
            }
        </script>
    </form>
</div>


@endsection
