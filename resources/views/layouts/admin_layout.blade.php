<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link href="{{asset('fonts/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    @yield('styles')
    <link rel = "icon" href =
    "{{asset('images/icon.png')}}"
          type = "image/x-icon">
    <title>@yield('title')</title>

</head>
<body class="@yield('body-class')">
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div>
        <ul class="nav custom-menu p-1 position-fixed w-100">
            <li class="nav-item">
                <a href="/">
                <img src="{{asset('images/e-white.png')}}" class="img-fluid ms-3" style="height: 40px">
                </a>
            </li>
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false" style="color: white !important;">{{Auth::user()->name}}</a>
                <ul class="dropdown-menu sign-drop">
                    <li><a class="dropdown-item" href="{{route('user.show', Auth::id())}}">Profile
                            &nbsp;
                            <i class="fas fa-long-arrow-alt-right"></i></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Messages &nbsp; <span class="badge bg-danger">5</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Projects &nbsp;
                            <i class="fas fa-long-arrow-alt-right"></i></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-item d-grid gap-2">
                      @include('includes.logout')
                    </li>
                </ul>
            </li>
        </ul></div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark pt-5">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light p-3">
                <a class="d-xl-none d-lg-none" href="#">Cerve Dashborad</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.index')}}"  aria-expanded="false" >ADMIN PANEL</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-user" aria-hidden="true"></i>Users</a>
                            <div id="submenu-2" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('user.index')}}">Admin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('writer.index')}}">Writers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('client.index')}}">Client</a>
                                    </li>


                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-99" aria-controls="submenu-99">
                                <i class="far fa-edit"></i>Application
                            </a>
                            <div id="submenu-99" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('application.index')}}">See applications<span
                                                class="badge
                                        bg-danger
                                        ms-2">3
                                        </span></a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-28"
                               aria-controls="submenu-2"><i class="fas fa-briefcase"></i>Projects</a>
                            <div id="submenu-28" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('task.index')}}">All projects</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('task.create')}}">Create project</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">In progress<span class="badge bg-danger ms-2">3
                                        </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Submissions<span class="badge bg-danger ms-2">3
                                        </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Bidding<span class="badge bg-danger ms-2">3
                                        </span></a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Completed</a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-25" aria-controls="submenu-25"><i class="fas fa-envelope"></i>
                                Messages</a>
                            <div id="submenu-25" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Inbox<span class="badge bg-danger ms-2">3
                                        </span></a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-21" aria-controls="submenu-21"><i class="fas fa-book-open"></i>
                                Examination</a>
                            <div id="submenu-21" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('exam.index')}}">English Test</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('essay.index')}}">Essay Test</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('exam.index')}}">View exams and essays</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-3" aria-controls="submenu-3"><i
                                    class="fas fa-shield-alt"></i>Discipline
                            </a>
                            <div id="submenu-3" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('discipline.index')}}">All discipline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Add Discipline</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-29" aria-controls="submenu-4"><i class="far fa-comment-alt"></i>Reviews</a>
                            <div id="submenu-29" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">See reviews</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-4" aria-controls="submenu-4"><i
                                    class="fas fa-envelope-open-text"></i>Notifications</a>
                            <div id="submenu-4" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('notifications.index')}}">See
                                            notifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('notifications.create')}}">Create
                                            notification</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-5" aria-controls="submenu-5"><i
                                    class="fas fa-mobile-alt"></i>Contacts
                            </a>
                            <div id="submenu-5" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('support.index')}}">See messages</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                               data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-file-invoice"></i>
                                Invoices</a>
                            <div id="submenu-6" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">See invoices
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fa fa-archive" aria-hidden="true"></i>Terms and Policy</a>
                            <div id="submenu-8" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('policy.index')}}">Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('policy.create')}}">Create Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="far fa-question-circle"></i>Faqs</a>
                            <div id="submenu-9" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('faqs.index')}}">Frequently Asked Question</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('faqs.create')}}">Create Faqs</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>
            </nav>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <div>
        @yield('content')
    </div>
    <div class="footer bg-light p-3 fixed-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    Copyright © 2021 Electronic Works</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')

</body>

</html>


