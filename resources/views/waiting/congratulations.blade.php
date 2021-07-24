@extends('layouts.main')
@section('title', 'Application Received')
@section('content')
    <section class="congrats">
        <div class="container">
            <div class="row mt-5">
                <div class="col-11 mx-auto  mt-5">
                    <div class="text-center">
                        <img src="{{asset('images/congrats.png')}}" alt="Congrats images" class="img-fluid ">
                    </div>

                    <h2 class="mt-5 text-center">Congratulations for submitting your Application!</h2>
                    <div class="text-left">
                        <p>Hi Joshua,</p>
                        <p>Thanks for submitting your request to sign up as a freelance writer with Electronic Works!
                            We’ll review your information and get back to you as soon as we can!
                            Normally that’s in just a few days. If you are approved to start working as a freelance writer ,
                            you will receive an email notifying you to sign in to your account.</p>
                        <p>We appreciate your patience</p>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
