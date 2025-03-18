<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('Title')</title>
    @yield('Meta')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.css')}}" />
    @yield('Css')

</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img
                                src="{{asset('assets/img/user8-128x128.jpg')}}"
                                class="user-image rounded-circle shadow"
                                alt="User Image"
                        />
                        <span class="d-none d-md-inline">Ersin ÇETİN</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <li class="user-header text-bg-primary">
                            <img
                                    src="{{asset('assets/img/user8-128x128.jpg')}}"
                                    class="rounded-circle shadow"
                                    alt="User Image"
                            />
                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2023</small>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="col-4 text-center"><a href="#">Followers</a></div>
                                <div class="col-4 text-center"><a href="#">Sales</a></div>
                                <div class="col-4 text-center"><a href="#">Friends</a></div>
                            </div>
                        </li>
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="{{url('/')}}" class="brand-link">
                <span class="brand-text fw-light m-0">AdminLTE 4</span>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul
                        class="nav sidebar-menu flex-column"
                        data-lte-toggle="treeview"
                        role="menu"
                        data-accordion="false"
                >
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            Location
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">
                @yield('Content')
            </div>
        </div>
    </main>
    <footer class="app-footer">
        <strong>
            <a href="https://adminlte.io" class="text-decoration-none">AdminLTE</a>.
        </strong>
        All rights reserved.
    </footer>
</div>

<script src="{{asset('assets/js/adminlte.js')}}"></script>
@yield('Script')
</body>
</html>
