<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="{{asset('admin/assets/img/favicon.png')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>

<body>
    <div class="loading d-flex justify-content-center align-items-center" id="loader">
        <div class="">
            <div class="text-center">
                <i class="fa-solid fa-spinner text-primary fs-2 spin my-2"></i>
                <h6 class="text-primary">Please wait for a few moment!</h6>
            </div>
        </div>
    </div>
    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="{{asset('admin/assets/img/logo.png')}}" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="{{asset('admin/assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{asset('admin/assets/img/icons/header-icon-04.svg')}}" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{asset('admin/assets/img/profiles/avatar-01.jpg')}}" width="31"
                                alt="Soeng Souy">
                            <div class="user-text">
                                <h6>Soeng Souy</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{asset('admin/assets/img/profiles/avatar-01.jpg')}}" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Soeng Souy</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="inbox.html">Inbox</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>

            </ul>

        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll" >
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>



                        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin#dashboard') }}" >
                                <i class="feather-grid"></i>
                                <span>Admin Dashboard</span>
                            </a>
                        </li>

                        <li class="submenu {{ Request::is('admin/'.'student'.'*') ? 'active' : '' }}">
                            <a href=""><i class="fas fa-graduation-cap"></i> <span> Students</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('admin#student') }}"
                                        class="{{ Request::is('admin/student') ? 'active' : '' }}">Student </a>
                                </li>
                                <li><a class="{{ Request::is('admin/students-list') ? 'active' : '' }}" href="{{ route('admin#studentslist') }}">Students List</a></li>
                                <li><a  class="{{Request::is('admin/student/add') ? 'active' : ''}}" href="{{route('admin#addStudentPage')}}">Add New Student</a></li>
                                <li><a  class="{{Request::is('admin/student/grade') ? 'active' : ''}}" href="{{route('admin#grade')}}">Grades</a></li>


                            </ul>
                        </li>
                        <li class="submenu {{ Request::is('admin/'.'teacher'.'*') ? 'active' : '' }}">
                            <a href=""><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a class="{{ Request::is('admin/teacher/list') ? 'active' : '' }}" href="{{route('admin#teacher')}}">Teacher List</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>




        <div class="page-wrapper">

                @yield('content')
            <footer>
                <p>Copyright © 2022 Dreamguys.</p>
            </footer>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
   <script src="{{asset('admin/assets/js/loading.js')}}"></script>
   <script src="{{asset('admin/assets/js/bug-fix.js')}}"></script>

</body>

</html>
