<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png')}}" />

    <title>MDAAS | Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/card-style.css')}}" rel="stylesheet">

    <!-- Datatable -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Form Designs -->
    <link href="{{ asset('admin/assets/form/css/style.css' )}}" rel='stylesheet'>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

    <!-- toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

</head>

<body id="page-top">
    @include('sweetalert::alert')
    @section('header')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #0f172b !important;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center p-5" href="{{url('admin/dashboard')}}">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fab fa-hive"></i> -->
                    <img style="height: 70px; border-radius: 50%;" src="{{ asset('logo.jpeg') }}" alt="logo" />
                </div>
                <!-- <div style="margin-left: 2px;" class="sidebar-brand-text">VistaHotel</div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('admin/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- minerals -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMinerals" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-file-contract"></i>
                    <span>Minerals</span>
                </a>
                <div id="collapseMinerals" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Add Mineral</a>
                        <a class="collapse-item" href="">Location Details</a>
                        <a class="collapse-item" href="">GEO Distribution</a>
                    </div>
                </div>
            </li>

            <!-- locations -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocations" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-map"></i>
                    <span>Location</span>
                </a>
                <div id="collapseLocations" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('admin/location/create') }}">Add Location</a>
                        <a class="collapse-item" href="{{ url('admin/location/search') }}">Search Location</a>
                        <a class="collapse-item" href="{{ url('admin/location') }}">Manage Locations</a>
                    </div>
                </div>
            </li>

            <!-- configration -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfigration" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-file-contract"></i>
                    <span>Configration</span>
                </a>
                <div id="collapseConfigration" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Division</a>
                        <a class="collapse-item" href="">District</a>
                        <a class="collapse-item" href="">Tehsil</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reports
            </div>

            <!-- Nav Item - Reports Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file-contract"></i>
                    <span>Reports</span>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('/admin/register')}}?id={{Auth::user()->id}}">Add User</a>
                        <a class="collapse-item" href="{{url('/admin/users')}}">Manage Users</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('admin/img/undraw_profile.svg')}}">
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

                    </ul>

                </nav>
                <!-- End of Topbar -->
                @show

                <!-- CONTENT DEFINE START -->
                <div class="content">
                    @section('content')
                    @show
                </div>
                <!-- CONTENT DEFINE END -->
                @section('footer')
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Vista Hotel 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        @show

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('admin/js/sb-admin-2.min.js')}}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('admin/js/demo/datatables-demo.js')}}"></script>

        <!-- excel export -->
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="js/demo/chart-bar-demo.js"></script>

        {{-- toastr js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

        <script>
            $(document).ready(function() {
                toastr.options.timeOut = 5000;
                @if (Session::has('error'))
                    toastr.error('{{ Session::get('error') }}');
                @elseif(Session::has('success'))
                    toastr.success('{{ Session::get('success') }}');
                @endif
            });
        </script>

</body>

</html>