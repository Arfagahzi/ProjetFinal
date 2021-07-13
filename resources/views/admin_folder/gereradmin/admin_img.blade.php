@extends('layouts.layouts_profile_admin.master')

@section('contenu')
    <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--        Style--}}
    <link rel="stylesheet" href="/css/image_admin.css">
    {{--        Style--}}

</head>

<body>
<div class="container">
    <div class="title"> Changer Votre photo de profile</div>
    <div class="content">
        <form action="{{route('img_admin_done')}}" method="post" enctype="multipart/form-data">
            @csrf



            <div class="user-details">
                <div class="input-box">
                    <span class="details">Photo de Profile</span>
                    <input id="image" type="file" class="form-control"
                           name="image"  required autocomplete="email" autofocus>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Changer">
            </div>
        </form>
        <div class="alert alert-info" style="display: none;"></div>

    </div>
</div>

</body>
</html>
@endsection
