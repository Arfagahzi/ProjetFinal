{{--@extends('layouts.layouts_profile.master')--}}

{{--@section('contenu')--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <!---<title> Responsive Registration Form | CodingLab </title>--->--}}


{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

{{--</head>--}}


{{--<body>--}}

{{--<div class="custom-info">--}}
{{--    <fieldset class="fild">--}}
{{--        <legend>Année Universitaire</legend>--}}
{{--        <div class="row">--}}
{{--            <div class="col"><span>Moyenne</span>--}}
{{--                <input type="text" name="moyenne"  style="width:50% " class="form-control " /></div>--}}
{{--            <div class="col"><span >Session</span>--}}
{{--                <select  name="session"  class=" form-select" >--}}
{{--                    <option value="0" disabled="true" selected="true">-Select-</option>--}}
{{--                    <option value="controle">Controle</option>--}}
{{--                    <option value="principale">Principale</option>--}}
{{--                </select></div>--}}
{{--            <div class="col"> <span>Montion</span>--}}
{{--                <select  name="montion"  class="form-select" >--}}
{{--                    <option value="0" disabled="true" selected="true">-Select-</option>--}}
{{--                    <option value="Pas de mention">Passable</option>--}}
{{--                    <option value="Assez bien">Assez bien</option>--}}
{{--                    <option value="Bien">Bien</option>--}}
{{--                    <option value="très bien">très bien</option>--}}

{{--                </select></div>--}}
{{--        </div>--}}
{{--            <div class="row">--}}
{{--            <div class="col">   <span>Université</span>--}}

{{--                <select  name="type" class="type_master form-select" >--}}
{{--                    <option value="0" disabled="true" selected="true">-Select-</option>--}}
{{--                    @foreach($universites as $universite)--}}
{{--                        <option value="{{$universite->id}}">{{$universite->universite}}</option>--}}
{{--                    @endforeach--}}

{{--                </select></div>--}}
{{--            <div class="col">--}}
{{--                <span>Etablissement</span>--}}

{{--                <select class="master form-select" name="master">--}}
{{--                    <option value="0" disabled="true" selected="true">Etablissement</option>--}}
{{--                </select></div>--}}
{{--            <div class="col"> <span>Filiere</span>--}}
{{--                <select class="filiere form-select" name="filiere">--}}
{{--                    <option value="0" disabled="true" selected="true">filiere</option>--}}
{{--                </select></div>--}}
{{--        </div>--}}

{{--    </fieldset>--}}


{{--</div>--}}
{{--<div class="button">--}}
{{--    <button type="button" class="btn btn-info " id="add_btn"><i class="las la-plus-circle">Ajouter</i></button>--}}
{{--    <button type="button" class="btn btn-success" id="save"><i class="las la-save">Enregistrer </i></button>--}}

{{--</div>--}}
{{--</body>--}}
{{--</html>--}}




{{--    <script type="text/javascript">--}}
{{--    $(document).ready(function (){--}}
{{--        $('#add_btn').on('click',function (){--}}
{{--            var html='<div class="custom-info">\n';--}}
{{--            var max=5;--}}
{{--            var x=1;--}}
{{--            if(x<max) {--}}
{{--                x++;--}}
{{--                html += '<fieldset class="fild">\n';--}}
{{--                html += '        <legend>Année Universitaire</legend>\n';--}}

{{--                html += '<div class="row">\n';--}}

{{--                html += '            <div class="col"><span>Moyenne</span>\n' +--}}
{{--                    '                <input type="text" name="moyenne"  style="width:50% " class="form-control " /></div>\n';--}}

{{--                html += '            <div class="col"><span >Session</span>\n' +--}}
{{--                    '                <select  name="session"  class=" form-select" >\n' +--}}
{{--                    '                    <option value="0" disabled="true" selected="true">-Select-</option>\n' +--}}
{{--                    '                    <option value="controle">Controle</option>\n' +--}}
{{--                    '                    <option value="principale">Principale</option>\n' +--}}
{{--                    '                </select></div>\n';--}}

{{--                html += '            <div class="col"> <span>Montion</span>\n' +--}}
{{--                    '                <select  name="montion"  class="form-select" >\n' +--}}
{{--                    '                    <option value="0" disabled="true" selected="true">-Select-</option>\n' +--}}
{{--                    '                    <option value="Pas de mention">Passable</option>\n' +--}}
{{--                    '                    <option value="Assez bien">Assez bien</option>\n' +--}}
{{--                    '                    <option value="Bien">Bien</option>\n' +--}}
{{--                    '                    <option value="très bien">très bien</option>\n' +--}}
{{--                    '\n' +--}}
{{--                    '                </select></div>\n';--}}
{{--                html += '</div>';--}}
{{--                html += '<div class="row">\n';--}}

{{--                html += '            <div class="col">   <span>Université</span>\n' +--}}
{{--                    '\n' +--}}
{{--                    '                <select  name="type" class="type_master form-select" >\n' +--}}
{{--                    '                    <option value="0" disabled="true" selected="true">-Select-</option>\n' +--}}
{{--                    '                    @foreach($universites as $universite)\n' +--}}
{{--                    '                        <option value="{{$universite->id}}">{{$universite->universite}}</option>\n' +--}}
{{--                    '                    @endforeach\n' +--}}
{{--                    '\n' +--}}
{{--                    '                </select></div>\n';--}}

{{--                html += '            <div class="col">\n' +--}}
{{--                    '                <span>Etablissement</span>\n' +--}}
{{--                    '\n' +--}}
{{--                    '                <select class="master form-select" name="master">\n' +--}}
{{--                    '                    <option value="0" disabled="true" selected="true">Etablissement</option>\n' +--}}
{{--                    '                </select></div>\n';--}}

{{--                html += '            <div class="col"> <span>Filiere</span>\n' +--}}
{{--                    '                <select class="filiere form-select" name="filiere">\n' +--}}
{{--                    '                    <option value="0" disabled="true" selected="true">filiere</option>\n' +--}}
{{--                    '                </select></div>\n';--}}
{{--                html += '</div>';--}}
{{--                html += ' <button style="margin-top: 20px" type="button" class="btn btn-danger" id="remove"><i class="las la-trash">Supprimer</i></button>';--}}

{{--                html += '</fieldset>';--}}


{{--                html += '</div>';--}}
{{--            }--}}
{{--                       $('div.custom-info').append(html);--}}


{{--        })--}}
{{--    });--}}

{{--    $(document).on('click','#remove',function (){--}}
{{--        $(this).closest('div.custom-info').remove();--}}
{{--    });--}}
{{--</script>--}}




















{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}

{{--            $(document).on('change','.master',function(){--}}

{{--                var master=$(this).val();--}}
{{--                console.log(master)--}}
{{--                var div=$(this).parent();--}}

{{--                var op=" ";--}}

{{--                $.ajax({--}}
{{--                    type:'get',--}}
{{--                    url:'{{ route('findfiliere') }}',--}}
{{--                    data:{'id':master},--}}
{{--                    success:function(data){--}}

{{--                        op+='<option value="0" selected disabled>choisir une filiere</option>';--}}
{{--                        for(var i=0;i<data.length;i++){--}}
{{--                            op+='<option value="'+data[i].id+'" required name="filiere">'+data[i].filiere+'</option>';--}}




{{--                        }--}}

{{--                        div.find('.filiere').html(" ");--}}
{{--                        div.find('.filiere').append(op);--}}
{{--                    },--}}
{{--                    error:function(){--}}

{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}

{{--            $(document).on('change','.type_master',function(){--}}

{{--                var type_m=$(this).val();--}}

{{--                var div=$(this).parent();--}}

{{--                var op=" ";--}}

{{--                $.ajax({--}}
{{--                    type:'get',--}}
{{--                    url:'{{ route('findetablissement') }}',--}}
{{--                    data:{'id':type_m},--}}
{{--                    success:function(data){--}}
{{--                        var html='<div class="row">\n';--}}
{{--                        html='<div class="col">\n';--}}
{{--                        op+='<option value="0" selected disabled>choisir un etablissement</option>';--}}
{{--                        html='</div>\n';--}}
{{--                        html='</div>\n';--}}

{{--                        for(var i=0;i<data.length;i++){--}}
{{--                            op+='<option value="'+data[i].id+'" required name="master">'+data[i].etablissement+'</option>';--}}




{{--                        }--}}

{{--                        div.find('.master').html(" ");--}}
{{--                        div.find('.master').append(op);--}}
{{--                    },--}}
{{--                    error:function(){--}}

{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
{{--    <!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="  ">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link rel="stylesheet" href="/css/annee_scolaire.css">--}}
{{--    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="item">--}}
{{--<p>Moyenne</p>--}}
{{--</div>--}}
{{--<div class="add_input_fields">--}}
{{--    <input type="text" name="">--}}
{{--    <button type="button" class="add_input_fields"><i class="fa fa-plus"></i> </button>--}}
{{--</div>--}}
{{--<script type="text/javascript">--}}
{{--   $(document).ready(function ()--}}
{{--   {var max_fields=10;--}}
{{--   var  wrapper= $(".add_input_fields");--}}
{{--   var add_button= $(".add_input_fields_button");--}}
{{--   var x=1;--}}
{{--   $(add_button).click(function (e) {--}}
{{--       e.preventDefault();--}}
{{--       if (x < max_fields){--}}
{{--       x++;--}}
{{--       $(wrapper).append('  <div class="add_fields">  <input type="" name=""> <a href="#" class="remove_field">' +--}}
{{--           '<i class="fa fa-times"></i> </a> </div>')--}}
{{--   }--}}
{{--   });--}}
{{--$(wrapper).on("click",".remove_field",function (e){--}}
{{--    e.preventDefault();--}}
{{--    $(this).parent('div').remove();--}}
{{--    x--;--}}
{{--});--}}

{{--   }) ;--}}

{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
@extends('layouts.layouts_profile.master')

@section('contenu')
    <head>
        <meta charset="UTF-8">
        <!---<title> Responsive Registration Form | CodingLab </title>--->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif

    <form action="{{route('submit_data')}}" method="post">@csrf
        <div class="ghazi">

            <fieldset class="block_annee">

                <legend>Année Universitaire n°:1</legend>

                <span>Moyenne</span>
                <input type="text" name="moyenne[]"  style="width:50% " class="form-control " />
                <span >Session</span>
                <select  name="sesion[]"  class=" form-select" >

                    <option value="0" disabled="true" selected="true">-Select-</option>
                    <option value="controle">Controle</option>
                    <option value="principale">Principale</option>
                </select>
                <span>Montion</span>
                <select  name="montion[]"  class="form-select" >
                    <option value="0" disabled="true" selected="true">-Select-</option>
                    <option value="Pas de mention">Pas de mention</option>
                    <option value="Assez bien">Assez bien</option>
                    <option value="Bien">Bien</option>
                    <option value="très bien">très bien</option>

                </select>
                <span>Université</span>

                <select  name="universite[]" class="type_master form-select" >
                    <option value="0" disabled="true" selected="true">-Select-</option>
                    @foreach($universites as $universite)
                        <option value="{{$universite->id}}">{{$universite->universite}}</option>
                    @endforeach

                </select>
                <span>Etablissement</span>

                <select class="master form-select" name="etablissement[]">
                    <option value="0" disabled="true" selected="true">Etablissement</option>
                </select>
                <span>Filiere</span>
                <select class="filiere form-select" name="filiere[]">
                    <option value="0" disabled="true" selected="true">filiere</option>
                </select>
            </fieldset>
        </div>
        <div>     <button type="button" class="btn btn-info" id="add_btn"><i class="las la-plus-circle"></i></button>

            <button type="submit" class="btn btn-success" id="save"><i class="las la-save"></i></button>

        </div>

    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function (){
            $('#add_btn').on('click',function (){
                var max=5;
                var x=1;
                if(x<max) {
                    x++;
                    var html = '<div class="ghazi" >';


                    html += '<hr>     ' +
                        ' <span>Moyenne</span>   ' +
                        '    <input type="text"  style="width: 50%" name="moyenne[]" class="form-control " />\n';
                    html += ' <span>Session</span>  ' +
                        ' <select  name="sesion[]"  class="form-select" >\n' +
                        '\n' +
                        '                        <option value="0" disabled="true" selected="true">-Select-</option>\n' +
                        '                            <option value="controle">Controle</option>\n' +
                        '                            <option value="principale">Principale</option>\n' +
                        '                         </select>   ';
                    html += ' <span>Montion</span>  ' +
                        '  <select class="form-select" name="montion[]"  >\n' +
                        '\n' +
                        '                        <option value="0" disabled="true" selected="true">-Select-</option>\n' +
                        '                        <option value="Pas de mention">Pas de mention</option>\n' +
                        '                        <option value="Assez bien">Assez bien</option>\n' +
                        '                        <option value="Bien">Bien</option>\n' +
                        '                        <option value="très bien">très bien</option>\n' +
                        '\n' +
                        '                    </select>    ';
                    html += '<span>Université</span> ' +
                        '<select  name="universite[]" class="type_master form-select" >\n' +
                        '\n' +
                        '       <option value="0" disabled="true" selected="true">-Select-</option>\n' +
                        '            @foreach($universites as $universite)\n' +
                        '              <option value="{{$universite->id}}">{{$universite->universite}}</option>\n' +
                        '                  @endforeach\n' +
                        '\n' +
                        '     </select>';
                    html += '<span>Etablissement</span> ' +
                        '<select  class="master form-select" name="etablissement[]">\n' +
                        '                    <option value="0" disabled="true" selected="true">Etablissement</option>\n' +
                        '                </select>';
                    html += ' <span>Filiere</span>' +
                        '<select  class="filiere form-select" name="filiere[]">\n' +
                        '           <option value="0" disabled="true" selected="true">filiere</option>\n' +
                        '                </select>';

                    html += ' <button type="button" class="btn btn-danger" id="remove"><i class="las la-trash"></i></button>';


                    html += '</div>';

                    $('fieldset').append(html);
                }  else
                {console.log('ckjxh');}

            })
        });

        $(document).on('click','#remove',function (){
            $(this).closest('div.ghazi').remove();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change','.master',function(){

                var master=$(this).val();

                var div=$(this).parent();

                var op=" ";

                $.ajax({
                    type:'get',
                    url:'{{ route('findfiliere') }}',
                    data:{'id':master},
                    success:function(data){

                        op+='<option value="0" selected disabled>choisir une filiere</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'" required name="filiere">'+data[i].filiere+'</option>';




                        }

                        div.find('.filiere').html(" ");
                        div.find('.filiere').append(op);
                    },
                    error:function(){

                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change','.type_master',function(){

                var type_m=$(this).val();

                var div=$(this).parent();

                var op=" ";

                $.ajax({
                    type:'get',
                    url:'{{ route('findetablissement') }}',
                    data:{'id':type_m},
                    success:function(data){

                        op+='<option value="0" selected disabled>choisir un etablissement</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'" required name="master">'+data[i].etablissement+'</option>';




                        }

                        div.find('.master').html(" ");
                        div.find('.master').append(op);
                    },
                    error:function(){

                    }
                });
            });
        });
    </script>
@endsection
