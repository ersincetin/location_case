<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('Title')</title>
    @yield('Meta')
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
    @yield('Css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{url('/')}}" class="brand-link">
            <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link">
                            <i class="fa fa-list-ul mr-3"></i>
                            <p>
                                Location List
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/create-route')}}" class="nav-link">
                            <i class="fa fa-map-marker mr-3" aria-hidden="true"></i>
                            <p>
                                Create Route
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>&nbsp;</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Location List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            @yield('Content')
        </section>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>
@yield('JavaScript')
</body>
</html>
