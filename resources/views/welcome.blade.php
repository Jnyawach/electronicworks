@extends('layouts.main')
@section('title', 'Electronic Works')
@section('content')
    <div class="hero mb-5">
        <div class=" container ">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-5 mx-auto m-2">
                    <h1>
                        Find top Quality<br>
                        Academic Writers for any<br>
                        Field Online<br>
                    </h1>
                    <h5>Best ideas turned into reality</h5>
                    <a href="{{route('register')}}" title="Hire a writer" class="btn btn-primary hire" >Hire a
                        writer</a>
                    <a href="{{route('registration.index')}}" title="Sign up as freelancer" class="btn
                    btn-outline-primary
                    free">Become a
                    writer</a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-7 mx-auto m-2">
                    <img src="{{asset('images/people-browsing.png')}}" class="img-fluid">

                </div>
            </div>
        </div>
    </div>
    <!--counter number beginning -->
    <section>
        <div class="container mt-5 pt-5 ">
            <div class="row">
                <div class="col-sm-11 col-md-4 col-lg-3 mx-auto qualified">
                    <div class="row">
                        <div class="col-3">
                            <h3>{{Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($project)}}</h3>
                        </div>
                        <div class="col-4">
                            <h4>COMPLETED JOBS</h4>
                        </div>


                    </div>

                </div>

                <div class="col-sm-11 col-md-4 col-lg-3 mx-auto qualified2">
                    <div class="row">
                        <div class="col-3">
                            <h3>{{Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($users)}}</h3>
                        </div>
                        <div class="col-4">
                            <h4>QUALIFIED WRITERS</h4>
                        </div>


                    </div>

                </div>

                <div class="col-sm-11 col-md-4 col-lg-3 mx-auto ">
                    <div class="row">
                        <div class="col-3">
                            <h3>{{$fields->count()}}</h3>
                        </div>
                        <div class="col-4">
                            <h4>EXPERT AREAS</h4>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </section>

    <!--counter number end -->
    <!--Why choose us--->
    <section>
        <div class="container mt-5 pt-5 choose">
            <h2 class="text-center">Why Choose Us?</h2>
            <div class="row mt-5">
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto text-center">
                    <img src="images/badge.png" class="img-fluid" alt="Quality Badge">
                    <h5 class="mt-3">BEST QUALITY</h5>
                    <p>We are dedicated to ensuring that our
                        clients receive top-quality content.
                        We assess the quality of every task assigned to
                        a writer to certify the quality.

                    </p>

                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto text-center">
                    <img src="images/notebbok.png" class="img-fluid" alt="Notebook">
                    <h5 class="mt-3">PROFESSIONAL WRITERS</h5>
                    <p>Our writers are highly vetted in their various fields and
                        certified before they are allowed to undertake a task.
                        Work with the best!</p>

                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto text-center">
                    <img src="images/clock.png" class="img-fluid" alt="Clock">
                    <h5 class="mt-3">ON TIME DELIVERY</h5>
                    <p>Delivering quality content within the specified
                        time is a challenge that faces many.
                        We stay ahead of our game by delivering good quality
                        on time.
                    </p>

                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto text-center">
                    <img src="images/finger-print.png" class="img-fluid" alt="Finger Print">
                    <h5 class="mt-3">UNIQUE CONTENT</h5>
                    <p>Our writers go the extra mile to extensively research topics.
                        Every product is original and unique with proper argumentation.
                        </p>

                </div>
            </div>
        </div>

    </section>
    <!-- End of Why Choose us-->
    <section class="backer">
        <div class="container mt-5 pt-5 join mb-5">
            <div class="row">
                <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                    <h1 class="mt-4">Join our team<br>
                        of experienced writer</h1>
                    <h5>We can’t wait to get you on board!</h5>
                    <a href="#" class="btn btn-primary hire mt-3">Apply here <i class="fas fa-long-arrow-alt-right ml-3"></i></a>
                </div>
                <div class="col-sm-11 col-md-5 col-lg-6 mx-auto">
                    <img src="images/Writers.png" class="img-fluid" alt="Writers">
                </div>

            </div>
        </div>
    </section>
    <!-- End of why choose us-->
    <!--Beginning of fields-->
    <section>
        <div class="container mt-5 pt-5">
            <h2 class="text-center">Expert in over {{$fields->count()}} Fields</h2>
            <div class="row mt-5">
                @foreach($fields->chunk(7) as $chunk)
                    @foreach($chunk as $field)
                <div class="col-sm-11 col-md-3 col-lg-3">
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>{{$field->name}}</p>

                </div>
                        @endforeach
                    @endforeach
            </div>
        </div>
    </section>
    <!-- End of Fields-->
    @endsection

