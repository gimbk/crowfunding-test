{{-- <!DOCTYPE html>
<html lang="fr">
    <head>

        <title>Tutoriel Laravel 9 CRUD pour débutant : insérer, Lire, modifier et supprimer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <div class="container mt-5">
            @yield('content')
        </div>

    </body>

</html> --}}










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front page</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">


    <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
    <link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <section class="header-top">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-md-3 col-sm-4">
                            <div class="join-us">
                                <p><a href="{{ url('user/create') }}">JOIN US NOW</a></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="join-us">
                                <p><a href="{{ url('project/create') }}">CREATE INITIATIVE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-8 col-xs-4">
                            <a href="#">
                                <div class="main-logo">
                                    <img src={{asset('img/main-logo.png')}} alt="">
                                    <h2>HELP TEST</h2>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="menu">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="{{ url('/') }}">HOME</a></li>
                                    <li><a href="#">ABOUT US</a></li>
                                    <li><a href="{{ url('/project/listAll') }}">PROJECTS</a></li>
                                    <li><a href="#">MOST DONATOR</a></li>
                                    {{-- <li style="background-color: #01d262; border:none;text-align:center"><a href="#" >CONTACT</a></li> --}}
                                    <a class="btn btn-primary" href="{{ url('/login') }}" style="background-color: #01d262; border:none;margin-left:10px;margin-top:10px">Login</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <section class="our_cuauses" style="margin-top:-80px">
            <h2>OPENED PROJECTS</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. </p>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="our_cuauses_single owl-carousel">
                    @foreach($listprojects as $listproject)
                            <div class="item">
                                <img src={{asset('img/our_cuauses_one.jpg')}} alt="">
                                <div class="for_padding">
                                    <h2>{{ $listproject->title }}</h2>
                                    <p>{{ $listproject->description }}</p>
                                    <div class="progress-text">
                                        <p class="progress-top">{{ (($listproject->currentAmount * 100)/$listproject->objectif) }}%</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ (($listproject->currentAmount * 100)/$listproject->objectif) }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ (($listproject->currentAmount * 100)/$listproject->objectif) }}%"></div>
                                        </div>
                                        <p class="progress-left">Raised: <span>${{ $listproject->currentAmount }}</span></p>
                                        <p class="progress-right">Goal: <span>${{ $listproject->objectif }}</span></p>
                                    </div>
                                    <h2 class="borderes"><a href="{{ url('/don/create/'. $listproject->id) }}">DONATE NOW</a></h2>
                                    
                                    
                                </div>
                            </div>
                     @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clear"></div>


        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-charity-text">
                            <h2>HELP TEST</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </p>
                            <hr>
                            <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="footer-text one">
                                    <h3>RECENT POST</h3>
                                    <ul>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i> Consectetur Adipisicing Elit</a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i> Consectetur Adipisicing </a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i> Consectetur Adipisicing Elit</a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i> Consectetur Adipisicing</a></li>
                                        <li><a href="#"><i class="material-icons">keyboard_arrow_right</i> Consectetur Adipisicing Elit</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <div class="footer-text two">
                                    <h3>USEFUL LINKS</h3>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Causes</a></li>
                                        <li><a href="#">Event</a></li>
                                        <li><a href="#">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="footer-text one">
                                    <h3>CONTACT US</h3>
                                    <ul>
                                        <li><a href="#"><i class="material-icons">location_on</i>1 Street, derby, FL 2147, USA</a></li>
                                        <li><a href="#"><i class="material-icons">email</i>dartthemes@gmail.com</a></li>
                                        <li><a href="#"><i class="material-icons">call</i>+123456789</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <p>Copyright @ 2017 <a href="#">DartThemes</a> | All Rights Reserved </p>
            </div>
        </footer>
    </div>
    <script src={{ asset('js/jquery-3.1.1.min.js') }}></script>
    <script src={{ asset('js/animationCounter.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}></script>
    <script src={{ asset('js/owl.carousel.min.js') }}></script>
    <script src={{ asset('js/active.js') }}></script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>

</html>