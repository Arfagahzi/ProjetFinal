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
    {{--        Style--}}
    <link rel="stylesheet" href="/css/gerer_filiere.css">
    {{--        Style--}}
</head>
<body>
<a href="{{route('show_add_filiere')}}">
    <button type="button" class="btn btn-success">Ajouter Filiére</button>
</a>
<hr>
<div class="wrapper">
    <h1> Liste Des Filiéres </h1>
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
                <th scope="col">Filiére</th>
                <th scope="col">Niveaux</th>
                <th scope="col">Etablissement</th>
                <th scope="col">Option</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($filieres as $filiere)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $filiere->filiere }}</td>
                    <td>{{ $filiere->niveau }}</td>
                    <td>{{ $filiere->etablissement }}</td>
                    <td>
                        <a href="{{"update_filiere/".$filiere->id}}">
                            <button type="button" class="btn btn-info">Modifer</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{"delete_filiere/". $filiere->id}}">   <button type="button" class="btn btn-danger" >
                                Supprimer </button>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{--            <script type="text/javascript">--}}
        {{--                function deleteConfirmation(id) {--}}
        {{--                    swal({--}}
        {{--                        title: "Delete?",--}}
        {{--                        text: "Please ensure and then confirm!",--}}
        {{--                        type: "warning",--}}
        {{--                        showCancelButton: !0,--}}
        {{--                        confirmButtonText: "Yes, delete it!",--}}
        {{--                        cancelButtonText: "No, cancel!",--}}
        {{--                        reverseButtons: !0--}}
        {{--                    }).then(function (e) {--}}
        {{--                        if (e.value === true) {--}}
        {{--                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
        {{--                            $.ajax({--}}
        {{--                                type: 'POST',--}}
        {{--                                url: "{{url('/delete_master')}}/" + id,--}}
        {{--                                data: {_token: CSRF_TOKEN},--}}
        {{--                                dataType: 'JSON',--}}
        {{--                                success: function (results) {--}}
        {{--                                    if (results.success === true) {--}}
        {{--                                        swal("Done!", results.message, "success");--}}
        {{--                                    } else {--}}
        {{--                                        swal("Error!", results.message, "error");--}}
        {{--                                    }--}}
        {{--                                }--}}
        {{--                            });--}}
        {{--                        } else {--}}
        {{--                            e.dismiss;--}}
        {{--                        }--}}
        {{--                    }, function (dismiss) {--}}
        {{--                        return false;--}}
        {{--                    })--}}
        {{--                }--}}
        {{--            </script>--}}
    </form>
</div>

</body>
</html>
@endsection
