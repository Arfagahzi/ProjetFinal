    <!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ISG SOUSSE</title>
    <link rel="icon" type="image/png" href="https://media-exp1.licdn.com/dms/image/C4E0BAQE3tYBbedpBuw/company-logo_200_200/0/1526295483398?e=2159024400&v=beta&t=8p4b1f4rN4VlzsOljoeVjejZ_4Za0QPX5ekrFX8r7ls" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{--    Style--}}
    <link rel="stylesheet" href="/css/main_profile_teacher.css">
</head>
<body>
<input type="checkbox" id="nav-toggle" style="visibility: hidden">
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span> <img src="http://www.isgs.rnu.tn/images/logo.png" width="330px" height="90px" style="
    margin-left: -26px;
    margin-top: -8px;
    border-radius: 30px;
">
            </span></h2>
        <a href="#"> <img src="data:image/jpeg;base64,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"
                          width="30px" height="30px" > </a>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href= class="active">
                    <span class="las la-igloo"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href='{{route('critere_page')}}'>
                    <span class="las la-clipboard-list"></span>
                    <span>Ajouter Critere</span>
                </a>
            </li>
            <li>
                <a href='{{route('gerer_addmision_page')}}'>
                    <span class="las la-clipboard-list"></span>
                    <span>Gérer Admission</span>
                </a>
            </li>

        </ul>
    </div>
</div>

<div class="main-content">
    <header style="  padding-bottom: 2%;">
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>
            Enseignant : {{ Auth::user()->name }} {{ Auth::user()->last_name }}
        </h2>


        <div class="action">
            <div class="profile" onclick="menuToogle();">
                <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="avatar" width="50px" height="50px">

            </div>
            <div class="menu">
                <h3>{{Auth::user()->name}} {{Auth::user()->last_name}} <br><br><small>Administrateur</small></h3>
                <ul>
                    <li><img src="https://image.flaticon.com/icons/png/128/1946/1946429.png"><a href="{{route('profile_teacher_page')}}">Modifier Profile</a></li>
                    <li><img src="https://image.flaticon.com/icons/png/128/3342/3342137.png"><a href="{{route('change_teacher_image')}}">Changer votre image</a></li>
                    <li><img src="https://image.flaticon.com/icons/png/128/3064/3064197.png"><a href="{{route('teacher_change_pass_page')}}">Changer mot de passe</a></li>
                    <li><img src="https://image.flaticon.com/icons/png/128/1828/1828427.png">
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Déconnexion
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        @yield('contenu')
    </main>
</div>
<script>
    function menuToogle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
    }
</script>
</body>
</html>

