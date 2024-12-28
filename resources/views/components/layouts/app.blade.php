<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link" style="text-decoration: none;">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 2">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" wire:navigate class="nav-link">
                                <i class="nav-icon bi bi-list-check"></i>
                                <span>
                                    Category
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/meal" wire:navigate class="nav-link">
                                <i class="nav-icon bi bi-basket"></i>
                                <span>
                                    Meal
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/order" wire:navigate class="nav-link">
                                <i class="bi bi-cart4"></i>
                                <span>
                                    Orders
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user" wire:navigate class="nav-link">
                                <i class="bi bi-people"></i>
                                <span>
                                    Users
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/department" wire:navigate class="nav-link">
                                <i class="bi bi-person-check"></i>
                                <span>
                                    Departments
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employee" wire:navigate class="nav-link">
                                <i class="bi bi-person-badge"></i>
                                <span>
                                    Employees
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user-meal" wire:navigate class="nav-link">
                                <i class="nav-icon bi bi-basket"></i>
                                <span>
                                    User Meal
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/attendance" wire:navigate class="nav-link">
                                <i class="bi bi-card-checklist"></i>
                                <span>
                                    Attendance
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/fixedSalary" wire:navigate class="nav-link">
                                <i class="bi bi-card-checklist"></i>
                                <span>
                                    Fixed Salary
                                </span>
                            </a>
                        </li>
                        @if (auth()->check())
                            <li class="nav-item">
                                <a href="/logout" class="nav-link">
                                    <i class="bi bi-box-arrow-right" style="color: red;"></i>
                                    <span>
                                        Log Out
                                    </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>

        {{ $slot }}

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="#">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>

    @livewireScripts
    <script>
        document.getElementById('dateInput').addEventListener('click', function() {
            this.showPicker(); // Kalendarni ochadi
        });

        document.getElementById('timeInput1').addEventListener('click', function() {
            this.showPicker(); // Vaqt tanlash oynasini ochadi
        });

        document.getElementById('timeInput2').addEventListener('click', function() {
            this.showPicker(); // Vaqt tanlash oynasini ochadi
        });
        document.getElementById('timeInput3').addEventListener('click', function() {
            this.showPicker(); // Vaqt tanlash oynasini ochadi
        });
        document.getElementById('timeInput4').addEventListener('click', function() {
            this.showPicker(); // Vaqt tanlash oynasini ochadi
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
