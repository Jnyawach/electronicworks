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
<header>

    <nav class="navbar navbar-expand-lg navbar-light p-2 container">
        <a class="navbar-brand"
           href="/"><img src="{{asset('/images/e-works-main.png')}}" class="img-fluid" style="height: 80px"></a>

    </nav>

</header>
<section class="p-4 errors mb-5">
    <div class="container">
        @yield('content')
    </div>
</section>

<!--Beginning of Footer-->
<footer class=" mt-0 p-5 form-footer">
    <div class="row">
        <div class="col-10 mx-auto text-center">
            <h5 class="mt-5" style="font-size: 15px">&copy; 2021-2021 Electronic works

            </h5>
            <ul>
                <li ><a href="{{route('privacy.index')}}" title="Privacy Policy">Privacy Policy</a> </li>
                <li ><a href="{{route('terms_condition.index')}}" title="Terms of use">Terms of use</a> </li>
            </ul>

        </div>
    </div>



</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
<!-- JavaScript Bundle with Popper -->

</html>
