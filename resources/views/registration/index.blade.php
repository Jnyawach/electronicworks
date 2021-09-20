@extends('layouts.main')
@section('title', 'Register')
@section('content')
    <section class="become">
        <div class="row">
            <div class="col-sm-11 col-md-10 col-md-10 mx-auto">
                <div class="card shadow-sm mb-5">
                    <div class="card-header">
                        <h5>Become a Freelance Writer with Us</h5>
                    </div>
                    <div class="card-body pt-5">
                        <div class="row">
                            <div class="col-sm-10 col-md-6 col-lg-6 mx-auto">
                                <h5 style="font-size: 18px">Why become a freelance writer with us?</h5>
                                <ol>
                                    <li>Choose from a hundred of orders placed every minute</li>
                                    <li>Work when it is convenient for you</li>
                                    <li>Directly communicate with customers in live chat</li>
                                    <li>Choose only orders you want to work on</li>
                                    <li>Get paid monthly</li>
                                </ol>

                            </div>

                            <div class="col-sm-10 col-md-5 col-lg-5 mx-auto green-body p-4">
                                <h5>Get a free account</h5>
                                <form class="mt-4" method="POST" action="{{route('registration.store')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control complete" id="email"
                                               aria-describedby="email" placeholder="Enter email address" name="email">

                                        <small class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="password" class="form-control complete" id="password"
                                               aria-describedby="password" placeholder="Enter Password"
                                               name="password">

                                        <small class="text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary mt-3">Proceed &nbsp&nbsp<i
                                                class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="row mt-5 mb-5">

                            <div class="col-sm-10 col-md-4 col-lg-4 mx-auto text-center">
                                <h2>{{Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($projects)}}</h2>
                                <h6>ORDERS COMPLETED</h6>
                                <p>Completed and delivered to clients</p>

                            </div>

                            <div class="col-sm-10 col-md-4 col-lg-4 mx-auto text-center">
                                <h2>4.8/5</h2>
                                <h6>RATING</h6>
                                <p>As reviewed by clients based on previous projects
                                </p>

                            </div>

                            <div class="col-sm-10 col-md-4 col-lg-4 mx-auto text-center">
                                <h2>{{$writer}}</h2>
                                <h6>REGISTERED WRITERS</h6>
                                <p>Vetted and certified writers available for projects.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
