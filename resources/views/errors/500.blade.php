@extends('layouts.handling')
@section('title','500 Page')
@section('body-class','green-body')
@section('content')
    <div class="row">
        <div class="col-10 mx-auto text-center">
            <img src="{{asset('images/500.png')}}" class="img-fluid m-3"alt="500 Error" style="height: 200px">
            <h1 class="mt-5">500</h1>
            <h4>Internal Serve Error!</h4>
            <p>We are working on fixing the problem. Be back soon</p>

        </div>
    </div>
@endsection

