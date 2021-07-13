
@extends('layouts.layouts_profile_teacher.master')

@section('contenu')

    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--        Style--}}
    <link rel="stylesheet" href="/css/add_crit.css">
    {{--        Style--}}



<!--    --><?php
//    $xmlDoc=simplexml_load_file("xml.Siad.xml");
//    print_r($xmlDoc);
//
//    ?>
    <div class="container">
    <div class="title"> Ajouter Critere</div>
    <div class="content">
        <form action="{{route('add_critere')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="user-details">

                <div class="input-box">
                    <span class="details">Critére</span>
                    <div class="col-md-12 form-group">
                        <input type="text" name="critere">
                    </div>

                </div>

                <div class="input-box">
                    <span class="details">Coefficiant</span>
                    <div class="col-md-12 form-group">
                        <input type="text" name="critere">
                    </div>

                </div>

                <div class="input-box">
                    <span class="details">Status</span>
                    <div class="col-md-12 form-group">
                        <input type="text" name="status">
                    </div>

                </div>

                <div class="input-box">
                    <span class="details">Bonnus</span>
                    <div class="col-md-12 form-group">
                        <select name="bonnus" id="bn" class="form-select">
                                <option disabled>-Select-</option>
                                <option value="+">+</option>
                                <option value="-">-</option>

                            </select>
                    </div>

                </div>


            <div class="button">
                <input type="submit" value="Enregistrer">
            </div>
            </div>
        </form>


        <div class="alert alert-info" style="display: none;"></div>
    </div>
</div>



@endsection
