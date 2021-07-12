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
                    <img src="images/people-browsing.png" class="img-fluid">

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
                            <h3>10K</h3>
                        </div>
                        <div class="col-4">
                            <h4>COMPLETED JOBS</h4>
                        </div>


                    </div>

                </div>

                <div class="col-sm-11 col-md-4 col-lg-3 mx-auto qualified2">
                    <div class="row">
                        <div class="col-3">
                            <h3>500</h3>
                        </div>
                        <div class="col-4">
                            <h4>QUALIFIED WRITERS</h4>
                        </div>


                    </div>

                </div>

                <div class="col-sm-11 col-md-4 col-lg-3 mx-auto ">
                    <div class="row">
                        <div class="col-3">
                            <h3>50</h3>
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
                    <p>Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s</p>

                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto text-center">
                    <img src="images/notebbok.png" class="img-fluid" alt="Notebook">
                    <h5 class="mt-3">PROFESSIONAL WRITERS</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s</p>

                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto text-center">
                    <img src="images/clock.png" class="img-fluid" alt="Clock">
                    <h5 class="mt-3">ON TIME DELIVERY</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s</p>

                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto text-center">
                    <img src="images/finger-print.png" class="img-fluid" alt="Finger Print">
                    <h5 class="mt-3">UNIQUE CONTENT</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s</p>

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
            <h2 class="text-center">Expert in over 50 Fields</h2>
            <div class="row mt-5">
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto">
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>History</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Actuarial Science</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Economics</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Accounting</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Business</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Art and Design</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Architecture</p>
                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto">
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>History</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Actuarial Science</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Economics</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Accounting</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Business</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Art and Design</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Architecture</p>
                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto">
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>History</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Actuarial Science</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Economics</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Accounting</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Business</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Art and Design</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Architecture</p>
                </div>
                <div class="col-sm-11 col-md-3 col-lg-3 mx-auto">
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>History</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Actuarial Science</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Economics</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Accounting</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Business</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Art and Design</p>
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>Architecture</p>
                </div>

            </div>
        </div>
    </section>
    <!-- End of Fields-->
    @endsection

