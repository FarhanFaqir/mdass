
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mdass - Contact Page</title>
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
                    <img class = "p-2 mt-1" height="75px" style="border-radius: 50%;"  src="{{ ('logo.jpeg') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="text-center navbar navbar-expand-lg  navbar-dark shadow-5-strong p-3 p-lg-0">
                        <a href="/" class="navbar-brand d-block d-lg-none ">
                            <img height="55px" style="border-radius: 50%;"  src="{{ ('logo.jpeg') }}" alt="">
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="/" class="nav-item nav-link mt-2">Home</a>
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
                                <a href="{{ url('/contact') }}" class="nav-item nav-link active mt-2">Contact Us</a>
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
        <div class="container-fluid p-0 mb-3" style="margin-top: -75px;">
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
        </div>
        <!-- Carousel End -->

        <!-- Contact Start -->
<div class="container-xxl py-4">
        <div class="container">
            <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                    <h2 class="" style="color: #9A0D07;">Contact Us For Any Query</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 style="color: #9A0D07">Get In Touch</h5>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; background-color: #9A0D07">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="" style="color: #9A0D07">Office</h5>
                            <p class="mb-0">Incubation Center KIU</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; background-color: #9A0D07">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="" style="color: #9A0D07">Mobile</h5>
                            <p class="mb-0">+92-3129360702</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; background-color: #9A0D07">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="" style="color: #9A0D07">Email</h5>
                            <p class="mb-0">mdaas.tech@gmail.com</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div> -->
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 py-3" style="background-color: #9A0D07; color:#fff" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn pt-5 mt-5" data-wow-delay="0.1s">
            <div class="container pb-5 pt-4">
                <div class="row g-5">
                    <div class="col-md-3 col-lg-3">
                        <img height="100px" style="border-radius: 50%;"  src="{{ ('logo.jpeg') }}" alt="">
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
</body>

</html>

