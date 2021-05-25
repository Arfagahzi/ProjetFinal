    <!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
                        {{--            Style--}}
    <link rel="stylesheet" href="/css/main_profile_student.css">
                        {{--            Style--}}
</head>
<body>

<input type="checkbox" id="nav-toggle" style="visibility: hidden">
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span> <img src="http://www.isgs.rnu.tn/images/logo.png" width="330px" height="90px" style="
        margin-left: 26px;
    margin-top: 8px;
    border-radius: 30px;
    width: 230px;
    height: 60px;
">
            </span></h2>

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
                <a href='{{"/student/student_profile/".session('inscrit_id')}}'>
                    <span class="las la-clipboard-list"></span>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{'/student/student_folder/'.session('inscrit_id')}}">
                    <span class="las la-clipboard-list"></span>
                    <span>Dossier</span>
                </a>
            </li>

            <li>
                <a href="{{'/student/Anneescolaire_page/'.session('inscrit_id')}}" >
                    <span class="las la-clipboard-list"></span>
                    <span>  Annees scolaire</span>
                </a>
            </li>

                <a href="#" >
                    <span class="las la-print"></span>
                    <span> Imprimer Condidature </span>
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
            Etudiant : {{ Auth::user()->name }} {{ Auth::user()->last_name }}
        </h2>


        <div class="action">
            <div class="profile" onclick="menuToogle();">
                <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="avatar" width="50px" height="50px">
            </div>
            <div class="menu">
                <h3>{{ Auth::user()->name }} {{ Auth::user()->last_name }} <br><small>Etudiant</small></h3>
                <ul>
                    <li><img src="https://image.flaticon.com/icons/png/128/1946/1946429.png"><a href="#">Edit Profile</a></li>
                    <li><img src="https://image.flaticon.com/icons/png/128/3342/3342137.png"><a href="#">Change image</a></li>
                    <li><img src="https://image.flaticon.com/icons/png/128/3064/3064197.png"><a href="#">Change password</a></li>
                    <li><img src="https://image.flaticon.com/icons/png/128/1828/1828427.png">
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">logout
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

