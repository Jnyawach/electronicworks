@extends('layouts.main')
@section('title', 'Setting Up')
@section('content')
    <section class="congrats">
        <div class="container">
            <div class="row mt-5">
                <div class="col-11 mx-auto  mt-5">
                    <div class="text-center">
                        <img src="{{asset('images/gears.gif')}}" class="img-fluid" style="height: 100px">
                    </div>

                    <h2 class="mt-5 text-center">Your application has been successfully submitted!</h2>
                    <div class="text-left">
                        <p>Hi {{Auth::user()->name}},</p>
                        <p>Thank you for choosing electronic works as your writing partner.
                        Please hold on while we setup up everything for you. This may take up to 48hrs.
                       We are excited to have you on board!</p>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
