
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IGS SOUSSE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->

    <link rel="stylesheet" href="/css/style_login.css">
</head>

<body>

<div class="wrapper" style="background-image:
url('data:image/jpeg;base64,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');">
    <div class="inner">
        <div class="image-holder">
            <img src="https://images.pexels.com/photos/4861373/pexels-photo-4861373.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        </div>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <h3>Verifier Votre Address Email</h3>
            @if (session('resent'))
                <div class="alert alert-success" role="alert" style="font-size: 17px ; font-family: 'Poppins', sans-serif" >
                    {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                </div>
            @endif

            <br>
            <div class="form-group" style="font-size: 17px;font-family: 'Poppins', sans-serif">
<p style="    line-height: 28px;">
   {{ __('Avant de continuer, veuillez consulter votre courriel pour obtenir un lien de vérification.') }}


                {{ __('Si vous n’avez pas reçu le courriel') }}, <br>
                {{ __('cliquez envoyer pour demander un autre') }},
</p>
            </div>


                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                    {{ __('Envoyer') }}
                </button>.


            <br>



        </form>




    </div>
</div>

</body>
</html>

