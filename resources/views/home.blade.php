<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    @yield('css')

</head>

<body class="rtl">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo me-5" href="/"><img src="{{asset('admin/images/logo.png')}}" class="me-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('admin/images/logo.png')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="ti-layout-grid2"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset('admin/images/empty.png')}}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <form action=" {{ route('logout') }}" method="post">
                                @csrf
                                @method('POST')
                                <button type="submit" class="dropdown-item">
                                    <i class="ti-power-off text-primary"></i>
                                    تسجيل الخروج
                                </button>
                            </form>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="ti-layout-grid2"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item {{ Request::route()->getName() == 'dash' ? 'active' : '' }}">
                        <a class="nav-link" href="">
                            <i class="ti-home menu-icon"></i>
                            <span class="menu-title">لوحة التحكم</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::route()->getName() == 'users' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title">ادارة المسؤولين</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::route()->getName() == 'student' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title">ادارة الطلاب</span>
                        </a>
                    </li>
               
                    <li class="nav-item {{ Request::route()->getName() == 'teacher' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('teacher') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title">ادارة المعلمين</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::route()->getName() == 'class' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('class') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title">الفصول</span>
                        </a>
                    </li>
                  
                </ul>
            </nav>
            
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('content')


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>
    <script src="{{asset('admin/js/settings.js')}}"></script>
    <script src="{{asset('admin/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->

    @yield('js')
</body>

</html>