@extends('layouts.main')
@section('title','Application Declined')
@section('content')
    <!-- start of Body-->
    <section class="congrats">
        <div class="container">
            <div class="row mt-5">
                <div class="col-11 mx-auto  mt-5">

                    <h2 class="mt-5 text-center">Not approved: Electronic Works Writer Account</h2>
                    <div class="text-left">
                        <p class="text-capitalize">Hi {{Auth::user()->name}},</p>
                        <p>Thank you for your time and interest in freelancing with Electronic Works</p>
                        <p>Unfortunately, we’re unable to approve your transcription account at this time.
                            If you would like to try again, you may do so in 45 days.</p>
                        <p>We see a lot of interest from freelancers in joining Electronic Works platform.
                            To ensure the quality of our platform for customers, we are only able to approve
                            freelancers that meet our quality standards. While we are unable to answer specific questions,
                            here are some common reasons we are unable to accept freelancers:</p>
                        <p>Grammar Mistakes</p>
                        <p>Substandard essay</p>
                        <p>We truly appreciate the time you have taken throughout this process.</p>
                    </div>


                </div>
            </div>
        </div>
    </section>


    <!--Beginning of Footer-->
@endsection
