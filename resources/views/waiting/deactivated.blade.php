@extends('layouts.main')
@section('title','Application Declined')
@section('content')
    <!-- start of Body-->
    <section class="congrats">
        <div class="container">
            <div class="row mt-5">
                <div class="col-11 mx-auto  mt-5">

                    <h2 class="mt-5 text-center">Deactivated: Electronic Works Writer Account</h2>
                    <div class="text-left">
                        <p class="text-capitalize">Hi {{Auth::user()->name}},</p>
                        <p>Unfortunately,  your account has been deactivated due to low rating.</p>
                        <p>We asses the quality of work produced by each writer and we are sorry to
                            inform you that you never met the minimum standard.
                            If you have a dispute about this decision don’t
                            hesitate to reach us through <span>support@electronicworks.com</span></p>
                    </div>


                </div>
            </div>
        </div>
    </section>


    <!--Beginning of Footer-->
@endsection

