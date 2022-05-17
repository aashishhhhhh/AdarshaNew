<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- this is a cdn of ck editor --}}
    <!--<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>-->
    {{-- this is our own custom css --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/spinner.css') }}">
    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v3.7.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>


<body class="hold-transition sidebar-mini layout-fixed text-sm">
   
    @livewireStyles
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i> <span
                            class="px-2">{{ auth()->user() == null ? 'ADMIN' : auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> <span
                                class="px-3">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                         <a href="{{route('change-pass')}}" class="dropdown-item" 
                        >
                            <i class="fas fa-lock-alt"></i> <span
                                class="px-3">{{ __('Change Password') }}</span>
                        </a>
                    </div>
                    
                    
                </li>
                
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/admin/adminHome') }}" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('page-type.index')}}" class="nav-link @yield('is_active_pages')">
                                <i class="fas fa-file"></i>
                               Pages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sliders.index')}}" class="nav-link @yield('is_active_slider')">
                                <i class="fas fa-sliders-h"></i>
                               Sliders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('message.index')}}" class="nav-link @yield('is_active_message')">
                                <i class="fas fa-comment-alt"></i>
                               Principles Message   
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('aboutus.index')}}" class="nav-link @yield('is_active_about_us')">
                                <i class="fas fa-address-card"></i>
                               About Us
                            </a>
                        </li>
 

                        <li class="nav-item has-treeview @yield('menu_show_faculty') ">
                            <a href="#" class="nav-link">
                                <i class="fas fa-building"></i>

                                <p class="px-2 font-weight-bold">
                                    {{ __('Faculty') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview " style="display: @yield('s_child_faculty')">
                                <li class="nav-item">
                                    <a href="{{route('faculty.index')}}"
                                        class="nav-link @yield('setting_faculty')">
                                        <i class="far fa-circle nav-icon"></i>
                                            Faculty
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('course.index')}}"
                                        class="nav-link @yield('setting_course')">
                                        <i class="far fa-circle nav-icon"></i>
                                        Course
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('notice.index')}}" class="nav-link @yield('is_active_notice')">
                                <i class="fas fa-comment-alt"></i>
                               Notice
                            </a>
                        </li>

                       

                        <li class="nav-item">
                            <a href="{{route('result.index')}}" class="nav-link @yield('is_active_result')">
                                <i class="fas fa-poll-h"></i>
                               Result
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('download.index')}}" class="nav-link @yield('is_active_download')">
                                <i class="fas fa-download"></i></i>
                               Downloads
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('gallery.index')}}" class="nav-link @yield('is_active_gallery')">
                                <i class="fas fa-photo-video"></i>
                               Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('article.index')}}" class="nav-link @yield('is_active_article')">
                                <i class="fas fa-newspaper"></i>
                                Article
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('alumni.index')}}" class="nav-link @yield('is_active_alumni')">
                                <i class="fas fa-user-graduate"></i>
                                Alumni
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.index')}}" class="nav-link @yield('is_active_members')">
                                <i class="fas fa-users"></i>
                                Members
                            </a>
                        </li>
                        
                        
                        <li class="nav-item has-treeview @yield('menu_show_site_settings') ">
                            <a href="#" class="nav-link">
                                <i class="fas fa-cog"></i>

                                <p class="px-2 font-weight-bold">
                                    {{ __('Site Settings') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview " style="display: @yield('s_child_faculty')">
                                <li class="nav-item">
                                    <a href="{{route('site-setting-list')}}"
                                        class="nav-link @yield('is_active_students')">
                                        <i class="far fa-circle nav-icon"></i>
                                            Contact Us
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview " style="display: @yield('s_child_faculty')">
                                <li class="nav-item">
                                    <a href="{{route('useful_links')}}"
                                        class="nav-link @yield('is_active_useful_links')">
                                        <i class="far fa-circle nav-icon"></i>
                                            Useful Links
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview " style="display: @yield('s_child_faculty')">
                                <li class="nav-item">
                                    <a href="{{route('school_address')}}"
                                        class="nav-link @yield('is_active_school_address')">
                                        <i class="far fa-circle nav-icon"></i>
                                            School Address
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content" style="position: relative;">
                <div class="container-fluid" id="content" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('main_content')
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="loader" style="    position: absolute;
                top: 60px;
                max-height:100vh;
                background: #fff;">
                    <div class="col-12">
                        <div align="center" class="fond">
                            <div class="contener_general">
                                <div class="contener_mixte">
                                    <div class="ballcolor ball_1">&nbsp;</div>
                                </div>
                                <div class="contener_mixte">
                                    <div class="ballcolor ball_2">&nbsp;</div>
                                </div>
                                <div class="contener_mixte">
                                    <div class="ballcolor ball_3">&nbsp;</div>
                                </div>
                                <div class="contener_mixte">
                                    <div class="ballcolor ball_4">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        </section>
        <!-- Main content -->
        <!-- /.content -->
    </div>
    </div>
    </div>
    <!-- ./wrapper -->
    @livewireScripts
    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("#loader").style.display = "block";
                document.querySelector("#content").style.display = "none";
            } else {
                document.querySelector("#loader").style.display = "none";
                document.querySelector("#content").style.display = "block";
            }
        };
    </script>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <!-- JQVMap -->
    {{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/land.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js" type="text/javascript"></script>
    <script>
        /* Select your element */
var mainInput = document.getElementById("nepali-datepicker");
 
 /* Initialize Datepicker with options */
 mainInput.nepaliDatePicker();
    </script>
    <script type="text/javascript">
     $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    @yield('scripts')
</body>

</html>
