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
<header class=" fixed-top w-100">


    <nav class="navbar navbar-expand-lg navbar-light p-2 ps-3 pe-4 w-100 main-bar">
        <a class="navbar-brand" href="/"><img src="{{asset('images/e-logo.png')}}" class="img-fluid" style="height:
        50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="menu">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">Contact Us</a>
                <a class="nav-item nav-link" href="#">Why Electronic Works?</a>
                <a class="nav-item nav-link" href="#">Reviews</a>


            </div>
            <ul class="nav">
                @guest
                    @if(Route::has('login'))
                        <li class="nav-item ">
                            <a class="nav-link active green" href="{{route('login')}}">Login</a>
                        </li>
                    @endif
                    @if(Route::has('register'))
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle shadow-none btn-sm" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sign Up
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end  sign-drop"
                                    aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{route('registration.index')}}">Freelancer <i
                                                class="fas
                            fa-long-arrow-alt-right ms-1
                          "></i></a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href="{{route('register')}}">Client <i class="fas
                            fa-long-arrow-alt-right ms-1
                          "></i></a></li>

                                </ul>
                            </div>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle shadow-none " type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name?Auth::user()->name:Auth::user()->email}}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end  sign-drop"
                                aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="{{route('freelancer.index')}}">Dashboard
                                        <i class="fas fa-house-user ms-2"></i></a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="{{route('freelancer.show', Auth::id())}}" class="dropdown-item">Profile <i class="fas
                                    fa-long-arrow-alt-right ms-2"></i></a>
                                </li>
                                <li><hr class="dropdown-divider"> </li>

                                <li>
                                    @include('includes.logout')
                                </li>

                            </ul>
                        </div>
                    </li>
                @endguest

            </ul>

        </div>
    </nav>
    <section class="sub-menu p-1">
        <div class="container">
            <nav class="nav">

                <a class="nav-link" href="{{route('project.index')}}">Browse Projects</a>
                <a class="nav-link" href="#">My projects</a>
                <a class="nav-link" href="#">Pending <span class="badge bg-danger ms-2">4</span></a>
                <a class="nav-link" href="#">Revisions <span class="badge bg-danger ms-2">1</span></a>
                <a class="nav-link" href="#">Message <span class="badge bg-danger ms-2">5</span></a>

            </nav>
        </div>
    </section>
</header>
<div class="wrapper d-flex align-items-stretch" style="margin-top: 120px!important;">
    <nav id="sidebar">
        <ul class="list-unstyled components mb-5">
            <li class="p-3" style="background-color:rgba(255,255,255,0.2);">
                <div class="d-inline-flex">
                    <img src="{{url(Auth::user()->getFirstMedia('avatar')? Auth::user()->getFirstMedia('avatar')
                    ->getUrl('avatar_icon'):'/images/no-image.png' )}}" class="img-fluid bg-light" style="height: 40px; width:
                     40px;border-radius: 50%">
                    <a href="{{route('freelancer.show', Auth::id())}}">
                        <h4 class="fs-5 fw-bold">{{Auth::user()->name}}</h4>
                    </a>


                </div>
                <h6 style="font-size: 13px"><span><i class="fas fa-star">
                           </i><i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                           </span>4.5/5 &nbsp|&nbsp800 Rating</h6>
            </li>
            <li>
                <a href="{{route('freelancer.index')}}"><span class="fa fa-home mr-3"></span> Dashboard</a>
            </li>
            <li>
                <a href="{{route('project.index')}}"><span class="fas fa-shopping-basket"></span>Projects Feeds</a>
            </li>

            <li>
                <a href="{{route('pending.index')}}"><span><i class="fas fa-stopwatch"></i></span>My Projects </a>
            </li>
            <li>
                <a href="#"><span><i class="fas fa-handshake"></i></span>Open Bids </a>
            </li>

            <li>
                <a href="#"><span><i class="fas fa-book-reader"></i></span>Revisions&nbsp;</a>
            </li>
            <li>
                <a href="#"><span><i class="fas fa-envelope"></i></span>Chat room</a>
            </li>
            <li>
                <a href="#"><span><i class="fas fa-file-invoice"></i></span>Invoices</a>
            </li>
        </ul>

        <p class="m-3" style="font-size: 16px">&copy;&nbsp;2021 Electronic Works<br>Cerve ltd</p>

    </nav>

    <!-- Page Content  -->
    <div id="content" class="">

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

