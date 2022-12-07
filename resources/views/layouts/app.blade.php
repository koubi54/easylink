<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>App Landing Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('carousel/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-app.css') }}">
    <script src="https://kit.fontawesome.com/ab8c4c3e50.js" crossorigin="anonymous"></script>
</head>

<body>
<div id="preloader-active">
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <i style="font-size: 200%; color: #a60dcf" class="fas fa-link"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo-new.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    @guest
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                                    @endguest
                                    @auth
                                        <li><a href="{{ route('dashboard', Auth::user()->username) }}">My Profile</a></li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-height sky-blue d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInUp" data-delay=".6s">Keep your links<br>with EasyLink</h1>
                                <p data-animation="fadeInUp" data-delay=".8s">EasyLink help you to gather all your
                                    links
                                    in a single page and share it with your followers
                                    in a
                                    single action.
                                </p>
                                <div class="slider-btn">
                                    <a data-animation="fadeInLeft" data-delay="1.0s" id="gotosec" href="#"
                                       class="btn radius-btn">Start for free</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img slidr-img mx-auto d-lg-block" data-animation="fadeInRight"
                                 data-delay="1s">
                                <img class="mx-auto" src="{{ asset('carousel/images/Untitled-3.png') }}"
                                     style="border-radius: 25px;" width="400" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="ftrs" class="service-area sky-blue section-padding2">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center">
                        <h2>Enjoy using features<br>of EasyLink!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-caption text-center mb-30">
                        <div class="service-icon">
                            <span class="flaticon-businessman"></span>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Use Anywhere</a></h4>
                            <p>Share all of your content, everywhere. There is no limit to where your myurls link
                                can be used.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-caption active text-center mb-30">
                        <div class="service-icon">
                            <span class="flaticon-pay"></span>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Get Real-Time Analytics</a></h4>
                            <p>Track profile views and individual link clicks to see what content your audience is
                                most interested in.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-caption text-center mb-30">
                        <div class="service-icon">
                            <span class="fas fa-palette"></span>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Personalize Your Profile</a></h4>
                            <p>Make your profile as unique as you are. Customize colors, fonts, background images,
                                and more.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="available-app-area">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6">
                    <div class="app-caption">
                        <div class="section-tittle section-tittle3">
                            <h2>Our app provides multiple themes to make your links look better</h2>
                            <p>Big plus! You can have visitor analytics for each link too. All of them are totally free!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <section id="car-slider">
                        <input type="radio" class="car" data-index="1" name="slider" id="s1"/>
                        <input type="radio" class="car" data-index="2" name="slider" id="s2"/>
                        <input type="radio" class="car" data-index="3" name="slider" id="s3"/>
                        <input type="radio" class="car" data-index="4" name="slider" id="s4"/>
                        <input type="radio" class="car" data-index="5" name="slider" id="s5" checked/>
                        <img class="label" for="s1" id="slide1"
                             src="{{ asset('carousel/images/iphone-12_1619346239790_1.png') }}" alt=""/>
                        <img class="label" for="s2" id="slide2"
                             src="{{ asset('carousel/images/iphone-12_1619346239791_2.png') }}" alt=""/>
                        <img class="label" for="s3" id="slide3"
                             src="{{ asset('carousel/images/iphone-12_1619346239792_3.png') }}" alt=""/>
                        <img class="label" for="s4" id="slide4"
                             src="{{ asset('carousel/images/iphone-12_1619348243305_0.png') }}" alt=""/>
                        <img class="label" for="s5" id="slide5"
                             src="{{ asset('carousel/images/iphone-12_1619348243310_1.png') }}" alt=""/>
                        <input type="hidden" id="num" value="1"/>
                    </section>
                </div>
            </div>
        </div>

        <div class="app-shape">
            <img src="assets/img/shape/app-shape-top.png" alt="" class="app-shape-top heartbeat d-none d-lg-block">
            <img src="assets/img/shape/app-shape-left.png" alt="" class="app-shape-left d-none d-xl-block">
        </div>
    </div>

    <div class="say-something-aera pt-90 pb-90 fix">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="offset-xl-1 offset-lg-1 col-xl-5 col-lg-5">
                    <div class="say-something-cap">
                        <h2>Say Hello To The Collaboration Hub.</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="say-btn">
                        <a href="#" class="btn radius-btn">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="say-shape">
            <img src="assets/img/shape/say-shape-left.png" alt="" class="say-shape1 rotateme d-none d-xl-block">
            <img src="assets/img/shape/say-shape-right.png" alt="" class="say-shape2 d-none d-lg-block">
        </div>
    </div>
</main>


<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>

<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>

<script src="./assets/js/jquery.slicknav.min.js"></script>

<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>

<script src="./assets/js/gijgo.min.js"></script>

<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

{{--<script src="./assets/js/jquery.scrollUp.min.js"></script>--}}
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script src="{{ asset('carousel/main.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

<script>
    var rotate, timeline;

    var totalItems = $(".car").length;

    $('#gotosec').on('click', function () {
        $('html, body').animate({
            scrollTop: $('#ftrs').offset().top + "px"
        }, 1500);
        event.preventDefault();
    });

    $(".car").on("click", function (e) {
        var element = e.target;
        var index = $(element).data("index");
        if (index == totalItems) {
            $("#num").val("1");
        } else {
            $("#num").val(parseInt(index) + 1);
        }
    });

    rotate = function () {
        var num = $("#num").val();

        $("#s" + num).prop("checked", true);
        if (parseInt(num) == totalItems) {
            $("#num").val("1");
        } else {
            $("#num").val(parseInt(num) + 1);
        }
    };
    timeline = setInterval(rotate, 3000);
</script>
</body>

</html>
