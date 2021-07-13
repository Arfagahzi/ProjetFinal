@extends('layouts.layouts_profile_admin.master')

@section('contenu')

<a href="{{"print_teacher/".$t->master_id}}"><button type="button" class="btn btn-secondary">Imprimer Liste</button></a>
<a href="{{route('manage_teacher')}}"><button type="button" class="btn btn-primary">Retour</button></a>
<hr>
<div class="wrapper">
    <h3> Liste Des Enseignants au Mastère : {{$master->title}} </h3>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Grade</th>
            <th scope="col">Option</th>

        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->last_name}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->grade}}</td>
                <td>
                    <a href="javascript:" rel="{{$teacher->id}}" rel1="delete_teacher" class="btn btn-danger btn-mini deleteRecord">Supprimer</a>

                </td>

            </tr>
        @endforeach



        </tbody>
    </table>

</div>

<script>
    $(".deleteRecord").click(function () {
        var id=$(this).attr('rel');
        var delete_teacher=$(this).attr('rel1');
        swal({
            title:'Are you sure?',
            text:"You won't be able to revert this!",
            type:'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes, delete it!',
            cancelButtonText:'No, cancel!',
            confirmButtonClass:'btn btn-success',
            cancelButtonClass:'btn btn-danger',
            buttonsStyling:false,
            reverseButtons:true
        },function () {
            window.location.href="/admin/"+delete_teacher+"/"+id;
        });
    });
</script>

@endsection
