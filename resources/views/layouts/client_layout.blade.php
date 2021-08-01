<!DOCTYPE html>
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
<body class="green-body">
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="logo">
            <a href="/">
            <img src="{{asset('images/e-works.png')}}" class="m-3 img-fluid" style="height: 80px">
            </a>
        </div>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{route('dashboard.index')}}"><span class="fa fa-home mr-3"></span> Dashboard</a>
            </li>
            <li>
                <a href="{{route('jobs.index')}}"><span class="fas fa-shopping-basket"></span>Projects</a>
            </li>
            <li>
                <a href="{{route('jobs.create')}}"><span><i class="fas fa-clipboard-list"></i></span>Post a project</a>
            </li>
            <li>
                <a href="{{route('market.index')}}"><span><i class="fas fa-handshake"></i></span>Under Bidding
                    &nbsp;
                </a>
            </li>
            <li>
                <a href="{{route('awaiting.index')}}"><span><i class="fas fa-stopwatch"></i></span>In progress &nbsp;
                   </a>
            </li>
            <li>
                <a href="{{route('checking.index')}}"><span><i class="fas fa-th"></i></span>Under Review &nbsp;</a>
            </li>
            <li>
                <a href="{{route('complete.index')}}"><span><i class="fas
                fa-business-time"></i></span>Submissions&nbsp; </a>
            </li>
            <li>
                <a href="{{route('returned.index')}}"><span><i class="fas fa-book-reader"></i></span>Revisions&nbsp;
                </a>
            </li>
            <li>
                <a href="#"><span><i class="fas fa-envelope"></i></span>Messages&nbsp; <span
                        class="badge bg-danger">1</span></a>
            </li>
            <li>
                <a href="#"><span><i class="fas fa-file-invoice"></i></span>Invoices</a>
            </li>
        </ul>

        <p class="m-3" style="font-size: 16px">&copy;&nbsp;2021 Electronic Works<br>Cerve ltd</p>

    </nav>

    <!-- Page Content  -->
    <div id="content" class="">
        <ul class="nav custom-menu p-1">
            <li class="nav-item">
                <button type="button" id="sidebarCollapse" class="btn btn-primary bg-none">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </li>
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false" style="color: white !important;">{{Auth::user()->name}}</a>
                <ul class="dropdown-menu sign-drop">
                    <li><a class="dropdown-item" href="{{route('dashboard.show',Auth::id())}}">Profile
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
        </ul>

        <div class="container pt-5 pl-3 dashboard">
            @yield('content')
        </div>
    </div>

    <!--end of page content-->
</div>
<footer class="mt-0">
    <div class="container p-5">
        <div class="row">
            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto text-center">
                <img src="{{asset('images/e-works.png')}}" class="img-fluid" alt="Electronic Works logo">
                <ul class="nav foot-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Work</a>
                    </li>

                </ul>
                <ul class="nav foot-nav-social justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Youtube"><i class="fab fa-youtube-square"></i></a>
                    </li>

                </ul>
            </div>

            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                <h5>Find Us</h5>
                <img src="{{asset('images/map.png')}}" class="img-fluid mt-3" alt="Location Map">
                <p class="mt-3">Email:info@electronicworks.com<br>
                    Phone:+254 7111 111 110
                </p>
            </div>
            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                <h5>Company</h5>
                <ul class="nav flex-column foot-menu">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Help & Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
        <h5 class="text-center mt-5" style="font-size: 15px">&copy; 2021-2021 Electronic works<br>
            Cerve Limited
        </h5>
    </div>


</footer>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')


</body>
</html>

