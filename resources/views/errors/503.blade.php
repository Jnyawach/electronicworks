@extends('layouts.handling')
@section('title','503 Page')
@section('body-class','green-body')
@section('content')
    <div class="row">
        <div class="col-10 mx-auto text-center">
            <img src="{{asset('images/503.png')}}" class="img-fluid m-3"alt="503 Error" style="height: 200px">
            <h1 class="mt-5">503</h1>
            <h4>Service Unavailable</h4>
            <p>Sorry, the page is temporarily unavailable</p>

        </div>
    </div>
@endsection

