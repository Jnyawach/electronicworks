@extends('layouts.handling')
@section('title','403 Page')
@section('body-class','green-body')
@section('content')
    <div class="row">
        <div class="col-10 mx-auto text-center">

            <h1 class="mt-3">403</h1>
            <h4>Access denied/ Forbidden</h4>
            <p>Sorry, but you don’t permission to access this page.<br>
                You can go back to <a href="#"> previous page</a></p>
            <img src="{{asset('images/403.png')}}" class="img-fluid m-3"alt="503 Error" style="height: 160px">
            <ul class="nav mt-5 justify-content-center">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/">Home page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url()->previous()}}">Previous page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">Help Center</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('help-and-support.index')}}">FAQS</a>
                </li>
            </ul>

        </div>
    </div>
    @endsection
