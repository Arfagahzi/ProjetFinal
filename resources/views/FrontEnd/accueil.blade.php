{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }} as {{ auth()->user()->role }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
<?php ?>
@extends('layouts.layout')

@section('content')
    <div class="hero-slide owl-carousel site-blocks-cover">
        <div class="intro-section" style="background-image: url('http://www.isgs.rnu.tn/uploaded/animation/isg_sousse_animation_5.png');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-section" style="background-image: url('data:image/jpeg;base64,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');">
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
                        <span>About Our University</span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem nesciunt quaerat ad reiciendis perferendis voluptate fugiat sunt fuga error totam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus assumenda omnis tempora ullam alias amet eveniet voluptas, incidunt quasi aut officiis porro ad, expedita saepe necessitatibus rem debitis architecto dolore? Nam omnis sapiente placeat blanditiis voluptas dignissimos, itaque fugit a laudantium adipisci dolorem enim ipsum cum molestias? Quod quae molestias modi fugiat quisquam. Eligendi recusandae officiis debitis quas beatae aliquam?</p>
                    <p><a href="#">Read more</a></p>
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
