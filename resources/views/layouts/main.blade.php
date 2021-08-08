<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link href="{{asset('fonts/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    @yield('styles')
    <link rel = "icon" href =
    "{{asset('images/icon.png')}}"
          type = "image/x-icon">

</head>
<body class="@yield('body-class')">

<header class=" fixed-top w-100">


    <nav class="navbar navbar-expand-lg navbar-light p-2 ps-3 pe-4 w-100 main-bar">
        <a class="navbar-brand" href="/"><img src="{{asset('images/e-logo.png')}}" class="img-fluid" style="height:
        50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="menu">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{route('contact.index')}}">Contact Us</a>
                <a class="nav-item nav-link" href="{{route('about')}}">Why Electronic Works?</a>
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
                                    @if(Auth::user()->role->name=='Writer')
                                        <a class="dropdown-item" href="{{route('freelancer.index')}}">Dashboard
                                            <i class="fas fa-house-user ms-2"></i></a>
                                        @elseif(Auth::user()->role->name=='Client')
                                        <a class="dropdown-item" href="{{route('dashboard.index')}}">Dashboard
                                            <i class="fas fa-house-user ms-2"></i></a>
                                        @endif
                                   </li>
                                <hr>
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
                @auth
                    <a class="nav-link" href="{{route('dashboard.index')}}">Dashboard</a>
                @endauth
                <a class="nav-link" href="#">Find Writers</a>
                <a class="nav-link active" aria-current="page" href="#">Browse Projects</a>
                <a class="nav-link" href="#">My projects</a>
                <a class="nav-link" href="#">Pending </a>
                <a class="nav-link" href="#">Revisions</a>

            </nav>
        </div>
    </section>
</header>

<main class="main-body" style="margin-top: 120px;" id="mydiv">
    @yield('content')
</main>

<footer class=" mt-5">
    <div class="container p-5">
        <div class="row">
            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto text-center">
                <img src="{{asset('images/e-works.png')}}" class="img-fluid" alt="Electronic Works logo">
                <ul class="nav foot-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('privacy.index')}}">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration.index')}}">Work</a>
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
                        <a class="nav-link" href="#" title="Youtube"><i class="fab fa-youtube-square"></i></i></a>
                    </li>

                </ul>
            </div>

            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                <h5>Find Us</h5>
                <img src="images/map.png" class="img-fluid mt-3" alt="Location Map">
                <p class="mt-3">Email:info@electronicworks.com<br>
                    Phone:+254 7111 111 110
                </p>
            </div>
            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                <h5>Company</h5>
                <ul class="nav flex-column foot-menu">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('contact.index')}}">Help & Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('help-and-support.index')}}">FAQS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('contact.index')}}">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('privacy.index')}}">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('terms_condition.index')}}">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
        <h5 class="text-center mt-5" style="font-size: 15px">&copy; 2021-2021 Electronic works<br>
            Cerve Limited
        </h5>
    </div>


</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@yield('scripts')

</body>
<!-- JavaScript Bundle with Popper -->

</html>

