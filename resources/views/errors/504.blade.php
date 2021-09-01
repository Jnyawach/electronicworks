@extends('layouts.handling')
@section('title','403 Page')
@section('body-class','green-body')
@section('content')
    <div class="row">
        <div class="col-10 mx-auto text-center">

            <h1 class="mt-5">504</h1>
            <h4>Gateway Timeout</h4>
            <p>We are sorry that it’s abit longer than you expected. Please don’t give up.</p>
            <img src="{{asset('images/504.png')}}" class="img-fluid m-3"alt="504 Error" style="height: 160px">
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

