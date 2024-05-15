<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mdass - Landing Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link href="{{ asset('logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="navbar-dark shadow-5-strong fixed-top" id="navbar-fixed-top">
            <div class="container px-0">
                <div class="row gx-0">
                    <div class="col-lg-3  d-none d-lg-block">
                        <a href="/" class="navbar-brand d-block ">
                            <img class="p-2 mt-1" height="75px" style="border-radius: 50%;" src="{{ ('logo.jpeg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <nav class="text-center navbar navbar-expand-lg  navbar-dark shadow-5-strong p-3 p-lg-0">
                            <a href="/" class="navbar-brand d-block d-lg-none ">
                                <img height="55px" style="border-radius: 50%;" src="{{ ('logo.jpeg') }}" alt="">
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0">
                                    <a href="/" class="nav-item nav-link active mt-2">Home</a>
                                    <a href="#about" class="nav-item nav-link mt-2">About Us</a>
                                    <a href="#services" class="nav-item nav-link mt-2">Our Services</a>
                                    <a href="{{ url('/gallery') }}" class="nav-item nav-link mt-2">Gallery</a>
                                    <!-- <div class="nav-item dropdown mt-2">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Services</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Feasibility Reports</a>
                                        <a href="" class="dropdown-item">Mine Planning</a>
                                        <a href="" class="dropdown-item">Mine Designing</a>
                                    </div>
                                </div> -->
                                    <a href="{{ url('/map') }}" class="nav-item nav-link mt-2">Google Map</a>
                                    <a href="{{ url('/contact') }}" class="nav-item nav-link mt-2">Contact Us</a>
                                    @if(Auth::check())
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-white-600 ">{{ Auth::user()->name }}</span>
                                            <img class="img-profile rounded-circle" height="40px" src="{{ asset('admin/img/undraw_profile.svg')}}">
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Profile
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>

                                        </div>
                                    </li>

                                    @else
                                    <a href="{{ route('login') }}" class="nav-item nav-link"><button class="btn" style="font-size:15px; padding-left: 15px; padding-right: 15px; background-color: #9A0D07; color: #fff;">Login</button></a>
                                    <a href="{{ route('register') }}" class="nav-item nav-link"><button class="btn reg-btn" style="font-size:15px; padding-left: 15px; padding-right: 15px; border-color: #9A0D07; color: #fff;">Register</button></a>
                                    @endif
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-3" style="margin-top: -75px;" id="carousel">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="height: 102vh; width:100%; filter: brightness(70%);" class=" img-fluid carousel-image" src="{{ asset('frontend/img/carousel-2.png') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="text-white mb-2 animated slideInDown carousel-heading">Minerals and Mining</h1>
                                <p class="text-white animated slideInDown m-auto carousel-text">Gilgit Baltistan is crowned with rich variety of minerals and gemstones,
                                    making mining the backbone to the region’s economy.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 102vh; width:100%; filter: brightness(100%);" class=" img-fluid carousel-image" src="{{ asset('frontend/img/carousel-1.png') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h3 class="display-5 text-white mb-2 animated slideInDown carousel-heading">Minerals and Mining</h3>
                                <p class="display-10 text-white animated slideInDown m-auto carousel-text">Gilgit Baltistan is crowned with rich variety of minerals and gemstones,
                                    making mining the backbone to the region’s economy.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 102vh; width:100%; filter: brightness(60%);" class=" img-fluid carousel-image" src="{{ asset('frontend/img/carousel-3.png') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h3 class="display-5 text-white mb-2 animated slideInDown carousel-heading">Minerals and Mining</h3>
                                <p class="display-10 text-white animated slideInDown m-auto carousel-text">Gilgit Baltistan is crowned with rich variety of minerals and gemstones,
                                    making mining the backbone to the region’s economy.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Service Start -->
        <div id="services" class="container-xxl py-5 mb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="" style="color: #9A0D07;">Our Services</h2>
                    <p class="text-center mb-3 text-dark">We Provide Great Services For You</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded p-4" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-bar-graph fa-2x"></i>
                                </div>
                            </div>
                            <h5 class="mb-3 text-left">Digitalization of Mineral’s Data </h5>
                            <p class="text-body mb-0">
                                Our company digitalize the data of
                                minerals with the help of GIS and
                                other mining software and create a
                                data bank of minerals of Pakistan
                                particular in Gilgit Baltistan.
                            </p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded p-4" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fbi bi-file-earmark-bar-graph fa-2x"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Maps and Feasibility Reports</h5>
                            <p class="text-body mb-0">
                                MDaaS is leading company in providing
                                Maps and feasibility reports of
                                mines in the Pakistan. We not only
                                provide maps of mines but also includes
                                maps related hydrology, agriculture,
                                disaster and forestry.
                            </p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded p-4" href="">
                            <div class="service-icon bg-transparent border rounded p-1 mt-4">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="bi bi-minecart-loaded fa-2x"></i>
                                </div>
                            </div>
                            <h5 class="mb-1 d-flex">Mine Planning and Designing</h5>
                            <p class="text-body mb-0">
                                MDaaS is one of companies in
                                Pakistan that provide services of
                                mine planning and designing with
                                the help of modern mining software
                                e.g. micro, surpac, Whittle ,CAD etc.
                                Our company deals with any type of
                                mine type that have to be design
                            </p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded p-4" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="bi bi-gem fa-2x"></i>
                                </div>
                            </div>
                            <h5 class="mb-3 text-left">Mineral’s Data</h5>
                            <p class="text-body mb-0">
                                MDaaS is first initiative that test the
                                mineral’s data to check whether the data
                                is authentic or not. This helps the
                                investors to minimize the over cost factor
                                in mining industry. Our company also test
                                the samples of any rock or soil on large
                                scale.
                            </p>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- About Start -->
        <div id="about" class="container-xxl about mb-2 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center wow fadeInUp pt-5" data-wow-delay="0.1s">
                    <h2 class="" style="color: #fff;">About Us</h2>
                    <p class="m-auto text-light w-60 p-5">
                        Mineral Data as a service (MDaaS) is mining Based startup that utilizing
                        the advanced Data as Service technologies for the Provision of authentic
                        mines and minerals Data to mineral sector stakeholder.
                        <br><br>

                        The motto of MDaaS is “To provide easy access to mineral’s data”. MDaaS
                        consists of all necessary information about minerals (location, grade,
                        distance from city etc.). The services also provide maps and feasibility reports.
                        This will not only bring new investors but also minimize risk factor in mining industry.


                    </p>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Stones Start -->
        <div class="container-xxl mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center wow fadeInUp pt-5" data-wow-delay="0.1s">
                    <h2 class="" style="color: #9A0D07;">Varieties of Minerals and Precious Stones</h2>
                    <p class="text-center mb-3 text-dark">Here are varities of some minerals and precious stones</p>
                </div>
                <div class="owl-carousel stone-carousel position-relative">
                    <div class="card">
                        <img class="card-img-top w-100 h-50" src="{{ ('frontend/img/stone-1.png') }}" style="width: 80px; height: 80px;">
                        <div class="stone-item text-center p-4 card-body" st>
                            <h5 class="card-title">Sapphire</h5>
                            <p class="card-text">
                                Sapphire is generally known as a blue
                                gemstone but surprisingly it comes in a
                                wide range of colors and quality
                                variations. In general, the more intense
                                and uniform the color is, the more
                                valuable the stone.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top w-100 h-50" src="{{ ('frontend/img/stone-2.png') }}" style="width: 80px; height: 80px;">
                        <div class="stone-item text-center p-4 card-body" st>
                            <h5 class="card-title">Quartz</h5>
                            <p class="card-text">
                                Quartz is the second most abundant
                                mineral in Earth's crust after feldspar.
                                It occurs in nearly all acid igneous,
                                metamorphic, and sedimentary rocks.
                                It is an essential mineral in such silica-
                                rich felsic rocks as granites, granodiorites,
                                and rhyolites.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top w-100 h-50" src="{{ ('frontend/img/stone-3.png') }}" style="width: 80px; height: 80px;">
                        <div class="stone-item text-center p-4 card-body" st>
                            <h5 class="card-title">Aquamarine</h5>
                            <p class="card-text">
                                Aquamarine is a common gemstone.
                                However, there is a rarer deep blue
                                variant called maxixe, but its color can
                                fade due to sunlight. The color of
                                maxixe is caused by NO3.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top w-100 h-50" src="{{ ('frontend/img/stone-4.png') }}" style="width: 80px; height: 80px;">
                        <div class="stone-item text-center p-4 card-body" st>
                            <h5 class="card-title">Tourmaline</h5>
                            <p class="card-text">
                                Tourmaline is a gemstone that belongs to
                                a complex family of borosilicate mixed
                                with iron, magnesium or other various
                                metals that depending upon the
                                proportions of its components may
                                form as red, pink, yellow, brown,
                                black, green, blue or violet.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top w-100 h-50" src="{{ ('frontend/img/stone-5.png') }}" style="width: 80px; height: 80px;">
                        <div class="stone-item text-center p-4 card-body" st>
                            <h5 class="card-title">Ruby</h5>
                            <p class="card-text">
                                Ruby is gem-quality red corundum. The
                                color comes from traces of chromium.
                                All other color varieties of gem-quality
                                corundum are referred to as sapphire.
                                Most gemological authorities expect a
                                medium to medium dark-red color tone
                                in a ruby.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top w-100 h-50" src="{{ ('frontend/img/stone-6.png') }}" style="width: 80px; height: 80px;">
                        <div class="stone-item text-center p-4 card-body" st>
                            <h5 class="card-title">Topaz</h5>
                            <p class="card-text">
                                Topaz is a silicate mineral of aluminium &
                                fluorine with the chemical formula Al2-
                                SiO4(F,OH)2. It is used as a gemstone
                                in jewelry & other adornments. Topaz
                                in its natural state is colorless, though
                                trace element impurities can make it pale
                                blue or golden brown to yellow orange.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stones End -->


        <!-- Testimonial Start -->
        <div class="container-xxl testimonial mb-3 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center wow fadeInUp pt-5" data-wow-delay="0.1s">
                    <h2 class="" style="color: #fff;">What Our Customers Say About Us</h2>
                    <p class="text-center mb-3 text-light">Here Are Our Happy Customers</p>
                </div>
                <div class="owl-carousel testimonial-carousel pt-2 pb-5">
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ ('frontend/img/testimonial-1.jpg') }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x position-absolute end-0 bottom-0 me-4 mb-n1" style="color: #9A0D07;"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ ('frontend/img/testimonial-2.jpg') }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x position-absolute end-0 bottom-0 me-4 mb-n1" style="color: #9A0D07;"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ ('frontend/img/testimonial-3.jpg') }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x position-absolute end-0 bottom-0 me-4 mb-n1" style="color: #9A0D07;"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        @if($id == 0)
        <!-- Team Start -->
        <div class="container-xxl mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center wow fadeInUp pt-5" data-wow-delay="0.1s">
                    <h2 class="" style="color: #9A0D07;">Our Valuable Team</h2>
                    <p class="text-center mb-3 text-dark">Meet Our Valuable Team Members</p>
                </div>
                <div class="owl-carousel team-carousel position-relative">
                    <div class="card shadow">
                        <img class="card-img-top w-100" src="{{ ('frontend/img/team-2.png') }}" style="width: 80px; height: 310px;">
                        <div class="text-center p-4 mt-0" style="border-top: 5px solid #9A0D07;">
                            <h5 class="fw-bold mb-0">Hunaid Ahmed</h5>
                            <small>CEO & Founder</small>
                        </div>
                    </div>
                    <div class="card shadow">
                        <img class="card-img-top w-100" src="{{ ('frontend/img/team-3.png') }}" style="width: 80px; height: 310px;">
                        <div class="text-center p-4 mt-0" style="border-top: 5px solid #9A0D07;">
                            <h5 class="fw-bold mb-0">Muhammad Ali</h5>
                            <small>Marketing Manager</small>
                        </div>
                    </div>
                    <div class="card shadow">
                        <img class="card-img-top w-100" src="{{ ('frontend/img/team-4.png') }}" style="width: 80px; height: 310px;">
                        <div class="text-center p-4 mt-0" style="border-top: 5px solid #9A0D07;">
                            <h5 class="fw-bold mb-0">Shakir Ali</h5>
                            <small>Managing Director</small>
                        </div>
                    </div>
                    <div class="card shadow">
                        <img class="card-img-top w-100" src="{{ ('frontend/img/team-5.png') }}" style="width: 80px; height: 310px;">
                        <div class="text-center p-4 mt-0" style="border-top: 5px solid #9A0D07;">
                            <h5 class="fw-bold mb-0">Sonia Munir</h5>
                            <small>IT Expert</small>
                        </div>
                    </div>
                    <div class="card shadow">
                        <img class="card-img-top w-100" src="{{ ('frontend/img/team-1.png') }}" style="width: 80px; height: 310px;">
                        <div class="text-center p-4 mt-0" style="border-top: 5px solid #9A0D07;">
                            <h5 class="fw-bold mb-0">Inam Ullah</h5>
                            <small>HR Manager</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        @endif

        <!-- Map Start -->
        <!-- <div id="map" class="w-100 wow zoomIn" data-wow-delay="0.1s">
            <h2 class="text-center mb-4" style="color: #9A0D07;">Google Map</h2>
            <div class="container-xxl map">
                <div class="text-center wow fadeInUp pt-5" data-wow-delay="0.1s">
                    
                   
                </div>
            </div>
        </div> -->
        <div style="height: 500px; width: 100% !important;">
          
            <div id="map" style="width: 100%; height: 100%;">
                <script type="text/javascript">
                    let map;
                    var locations = <?php echo $locations; ?>;
                    var id = <?php echo $id; ?>;
                    // console.log("id " + id)

                    function initMap() {

                        map = new google.maps.Map(document.getElementById("map"), {
                            center: new google.maps.LatLng(35.925623, 74.366250),
                            zoom: 8,
                        });
                        /* Add multiple markers to map */
                        var infoWindow = new google.maps.InfoWindow();
                        var marker, i;
                        for (i = 0; i < locations.length; i++) {
                            var position = new google.maps.LatLng(locations[i].latitude, locations[i].longitude);
                            // console.log(position)
                            const tittle = position;
                            marker = new google.maps.Marker({
                                position: position,
                                map: map,
                                title: locations[i].location_name

                            });
                            // console.log(marker)

                            //     /* Add info window to marker   */

                            google.maps.event.addListener(marker, 'click', (function(marker, i) {

                                return function() {
                                    if (id > 0) {
                                        infoWindow.setContent(

                                            '<div class="info_content">' +
                                            '<h6 class="dialog-title">Name: ' + locations[i].location_name + '</h6><br>' +
                                            '<pre class="dialog-title">latitude     ' + locations[i].latitude + '</pre>' +
                                            '<pre class="dialog-title">longitude    ' + locations[i].longitude + '</pre>' +
                                            '<pre class="dialog-title">Description    ' + locations[i].description + '</pre>' +
                                            '</div>'
                                        );
                                        infoWindow.open(map, marker);
                                    } else {
                                        window.location.href = '/login'
                                    }
                                }

                            })(marker, i));

                        }


                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyLZCbRGhWTf7YajA56LlSHgX4wHNxK90&callback=initMap&v=weekly" async defer></script>
            </div>
        </div>
        <!-- Map End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn pt-5 mt-0" data-wow-delay="0.1s">
            <div class="container pb-5 pt-4">
                <div class="row g-5">
                    <div class="col-md-3 col-lg-3">
                        <img height="100px" style="border-radius: 50%;" src="{{ ('logo.jpeg') }}" alt="">
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-uppercase mb-4" style="color: #9A0D07;">Contact</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Incubation Center KIU</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+92-3129360702</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>mdaas.tech@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-uppercase mb-4" style="color: #9A0D07;">Company</h6>
                                <a class="btn btn-link" href="">About Us</a>
                                <a class="btn btn-link" href="">Contact Us</a>
                                <a class="btn btn-link" href="">Privacy Policy</a>
                                <a class="btn btn-link" href="">Terms & Condition</a>
                                <a class="btn btn-link" href="">Google Maps</a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-uppercase mb-4" style="color: #9A0D07;">Services</h6>
                                <a class="btn btn-link" href="">Digitalization of Mineral’s</a>
                                <a class="btn btn-link" href="">Maps and Feasibility Reports</a>
                                <a class="btn btn-link" href="">Mine Planning and Designing</a>
                                <a class="btn btn-link" href="">Validation and Testing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">MDAAS Pvt Ltd</a>, All Rights Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <p>Developed By : <a href="https://pk.linkedin.com/in/farhanfaqir488" target="blank" style="color: #9A0D07; text-decoration: underline;">Farhan Faqir</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
        const navbar = document.querySelector('#navbar-fixed-top');
        window.onscroll = () => {
            if (window.scrollY > 200) {
                navbar.classList.add('nav-active');
            } else {
                navbar.classList.remove('nav-active');
            }
        };
    </script>

    <!-- <script type="text/javascript">
        let map;
        var locations = <?php echo $locations; ?>;
        var id = <?php echo $id; ?>;
        // console.log("id " + id)

        function initMap() {

            map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(35.925623, 74.366250),
                zoom: 8,
            });
            /* Add multiple markers to map */
            var infoWindow = new google.maps.InfoWindow();
            var marker, i;
            for (i = 0; i < locations.length; i++) {
                var position = new google.maps.LatLng(locations[i].latitude, locations[i].longitude);
                // console.log(position)
                const tittle = position;
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: locations[i].location_name

                });
                // console.log(marker)

                //     /* Add info window to marker   */

                google.maps.event.addListener(marker, 'click', (function(marker, i) {

                    return function() {
                        if (id > 0) {
                            infoWindow.setContent(

                                '<div class="info_content">' +
                                '<h6 class="dialog-title">Name: ' + locations[i].location_name + '</h6><br>' +
                                '<pre class="dialog-title">latitude     ' + locations[i].latitude + '</pre>' +
                                '<pre class="dialog-title">longitude    ' + locations[i].longitude + '</pre>' +
                                '<pre class="dialog-title">Description    ' + locations[i].description + '</pre>' +
                                '</div>'
                            );
                            infoWindow.open(map, marker);
                        } else {
                            window.location.href = '/login'
                        }
                    }

                })(marker, i));

            }


        }
    </script> -->
</body>

</html>