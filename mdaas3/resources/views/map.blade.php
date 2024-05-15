<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MDAAS - Google Map</title>
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
        <div class="navbar-dark shadow-5-strong fixed-top bg-dark" id="navbar-fixed-top">
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
                                    <a href="/" class="nav-item nav-link mt-2">Home</a>
                                    <a href="http://127.0.0.1:8000/#about" class="nav-item nav-link mt-2">About Us</a>
                                    <a href="http://127.0.0.1:8000/#services" class="nav-item nav-link mt-2">Our Services</a>
                                    <a href="{{ url('/gallery') }}" class="nav-item nav-link mt-2">Gallery</a>
                                    <!-- <div class="nav-item dropdown mt-2">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Services</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Feasibility Reports</a>
                                        <a href="" class="dropdown-item">Mine Planning</a>
                                        <a href="" class="dropdown-item">Mine Designing</a>
                                    </div>
                                </div> -->
                                    <a href="{{ url('/map') }}" class="nav-item nav-link active mt-2">Google Map</a>
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

        <!-- Map Start -->
        <div style="height: 85vh; width: 100%; margin:0px" class="mt-3 row">
                <div class="col-md-2 p-4 ml-auto">
                    <form action="{{ url('/search') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label font-weight-bold">Division</label>
                            <select name="division" id="division" class=" form-control">
                                <option value="">Select Division</option>
                                <option value="Gilgit">Gilgit</option>
                                <option value="Baltistan">Baltistan</option>
                                <option value="Hunza">Hunza</option>
                                <option value="Diamer">Diamer</option>
                            </select>
                            @if ($errors->has('division'))
                            <span class="text-danger">{{ $errors->first('division') }}</span>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label font-weight-bold">District</label>
                            <select name="district" id="district" class=" form-control">
                                <option value="">Select District</option>
                                <option value="Hunza">Hunza</option>
                                <option value="Ghizer">Ghizer</option>
                                <option value="Diamer">Diamer</option>
                                <option value="Astore">Astore</option>
                                <option value="Nagar">Nagar</option>
                            </select>
                            @if ($errors->has('district'))
                            <span class="text-danger">{{ $errors->first('district') }}</span>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label font-weight-bold">Tehsil</label>
                            <select name="tehsil" id="tehsil" class=" form-control">
                                <option value="">Select Tehsil</option>
                                <option value="Aliabad">Aliabad</option>
                                <option value="Danyore">Danyore</option>
                            </select>
                            @if ($errors->has('tehsil'))
                            <span class="text-danger">{{ $errors->first('tehsil') }}</span>
                            @endif
                        </div>
                        <div class="form-group m-t">
                            <label class="control-label font-weight-bold">Mineral</label>
                            <select name="mineral" id="mineral" class=" form-control">
                                <option value="">Select Mineral</option>
                                <option value="Topas">Topas</option>
                                <option value="Gold">Gold</option>
                                <option value="Ruby">Ruby</option>
                                <option value="Cooper">Cooper</option>
                                <option value="Aquamarine">Aquamarine</option>
                            </select>
                            @if ($errors->has('mineral'))
                            <span class="text-danger">{{ $errors->first('mineral') }}</span>
                            @endif
                        </div>
                        <div class="text-right mt-2">
                            <input type="submit" class="btn" style="background-color: #0f172b; color: #fff; text-transform: none;" value='Search Location'>
                        </div>
                    </form>
                </div>

                <div class="col-md-10" id="map" style="height: 100%;">
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


        <!-- Carousel Start -->
        <!-- <div class="container-fluid p-0 mb-3" style="margin-top: -75px;">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style=" width:100%; filter: brightness(60%); " class=" img-fluid carousel-image" src="{{ asset('frontend/img/contact.png') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="text-white mb-2  carousel-heading">Lets Start A Conversation</h1>
                                <p class="text-white m-auto carousel-text">
                                    We are here for you, if you have any query please feel free to contact
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Carousel End -->



        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn pt-5 mt-1" data-wow-delay="0.1s">
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
                        <div class="col-md-6 text-center text-md-start mb-md-0">
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
</body>

</html>