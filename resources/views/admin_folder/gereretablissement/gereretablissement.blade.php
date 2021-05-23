@extends('layouts.layouts_profile_admin.master')
@section('contenu')

                {{-- Style--}}
        <link rel="stylesheet" href="/css/gerer_etab.css">
                {{-- Style--}}

                <a href="{{route('show_add_etablissement')}}">
                    <button type="button" class="btn btn-success">Ajouter Etablissement</button>
                </a>

    <hr>
    <div class="wrapper">
        <h1> Liste Des Etablissements  </h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Etablissement</th>
                <th scope="col">Université</th>
                <th scope="col">Option</th>

            </tr>
            </thead>
            <tbody>

                @foreach ($etablissements as $etablissement)
                    <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $etablissement->etablissement }}</td>
                <td>{{ $etablissement->universite }}</td>
                    <td>
                        <a href="{{"show_update_etablissement/".$etablissement->id}}"><button type="button" class="btn btn-info">Modifer</button></a>
                    </td>
                <td>
                    <a href="{{"delete_etab/". $etablissement->id}}"><button type="button" class="btn btn-danger">Supprimer</button></a>
                </td>
                    </tr>
                @endforeach



            </tbody>
        </table>

    </div>
                @include('sweetalert::alert')


@endsection
