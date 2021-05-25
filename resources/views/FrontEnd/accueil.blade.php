
<?php ?>
@extends('layouts.layout')

@section('content')
    <div class="hero-slide owl-carousel site-blocks-cover">
        <div class="intro-section" style="background-image: url('https://content.mosaiquefm.net/uploads/content/thumbnails/ministere_de_l_enseignement_superieur_1574278473.png');    background-position: center; background-size: 1100px; background-repeat: no-repeat;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-section"style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDAXnAiCdvt6pckSFDaKUddL6eMlnpqvTSTw&usqp=CAU');    background-position: center; background-size: 1000px; background-repeat: no-repeat;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div></div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span> Notre Espace </span>
                    </h2>
                </div>
            </div>
            @guest
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="flaticon-mortarboard text-white"></span>
                        </div>
                        <div class="feature-1-content">
                            <h2>Espace Etudiant </h2>
                            <p><a href="{{ route('login') }}" class="btn btn-primary px-4 rounded-0">Consulter Condidature</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="flaticon-school-material text-white"></span>
                        </div>
                        <div class="feature-1-content">
                            <h2>Espace Jury</h2>
                            <p><a href="{{ route('teacher_login') }}" class="btn btn-primary px-4 rounded-0">Consulter Jury</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-1 border">
                        <div class="icon-wrapper bg-primary">
                            <span class="flaticon-library text-white"></span>
                        </div>
                        <div class="feature-1-content">
                            <h2>Espace Administratif</h2>
                            <p><a href="{{ route('admin_login') }}" class="btn btn-primary px-4 rounded-0">Consulter Adminstration</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
        </div>
    </div>
    <div class="site-section">
        <div class="container">
        </div>
    </div>
    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section-title-underline style-2">
                        <span>Présentation ISG </span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <p class="lead">Situé au cœur de Sousse depuis 1995, l’Institut  Supérieur de gestion de Sousse est une des composantes principales de l'Université de Sousse. Il propose à près de 3500 étudiants, encadrés par quelques 200 enseignants (professeurs des universités, maîtres de conférences, maîtres assistants, assistants et intervenants issus du monde professionnel) des formations  diplômantes dans les domaines de : Gestion, Informatique de Gestion et Economie.
                    </p>
                    <p>L’ISG propose aujourd’hui un éventail de disciplines très complet et revendique très fortement le caractère pluridisciplinaire de son offre. Ainsi, l’ensemble de formations dispensées témoigne d’un institut ouvert sur le monde extérieur, le monde professionnel et fortement impliqué dans le processus de développement socio-économique du pays.</p>
                    <p><a href="#" class="btn btn-light">Read more</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- // 05 - Block -->
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4">
                    <h2 class="section-title-underline">
                        <span>Notre Jury </span>
                    </h2>
                </div>
            </div>


            <div class="owl-slide owl-carousel">

                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3>Allison Holmes</h3>
                            <span>Designer</span>
                        </div>
                    </div>
                    <div>
                        <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                    </div>
                </div>

                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3>Allison Holmes</h3>
                            <span>Designer</span>
                        </div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                    </div>
                </div>

                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_4.jpg" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3>Allison Holmes</h3>
                            <span>Designer</span>
                        </div>
                    </div>
                    <div>
                        <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                    </div>
                </div>

                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3>Allison Holmes</h3>
                            <span>Designer</span>
                        </div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                    </div>
                </div>

                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3>Allison Holmes</h3>
                            <span>Designer</span>
                        </div>
                    </div>
                    <div>
                        <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                    </div>
                </div>

                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_4.jpg" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3>Allison Holmes</h3>
                            <span>Designer</span>
                        </div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="icon flaticon-mortarboard"></span>
                    <h3>Our Philosphy</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="icon flaticon-school-material"></span>
                    <h3>Academics Principle</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                        Dolore, amet reprehenderit.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="icon flaticon-library"></span>
                    <h3>Key of Success</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                        Dolore, amet reprehenderit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="news-updates">
        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    <div class="section-heading">
                        <h2 class="text-black">Actualités</h2>
                        <br>
                        <a href="http://www.isgs.rnu.tn/">Read All News</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="post-entry-big">
                                <a href="news-single.html" class="img-link"><img src="images/blog_large_1.jpg" alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="post-entry-big horizontal d-flex mb-4">
                                <a href="news-single.html" class="img-link mr-4"><img src="images/blog_1.jpg" alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                                </div>
                            </div>

                            <div class="post-entry-big horizontal d-flex mb-4">
                                <a href="news-single.html" class="img-link mr-4"><img src="images/blog_2.jpg" alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                                </div>
                            </div>

                            <div class="post-entry-big horizontal d-flex mb-4">
                                <a href="news-single.html" class="img-link mr-4"><img src="images/blog_1.jpg" alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


@endsection

@section('js')
@endsection
