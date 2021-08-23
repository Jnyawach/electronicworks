@extends('layouts.main')
@section('title','Terms and Condition')
@section('body-class','green-body')
@section('content')
    <section class="mt-5 pt-3">
        <h5 class="mt-5 text-center">Terms and Condition</h5>
        <div class="row">

            <div class="col-8 mx-auto">
                <h4 class="fw-bold">{{$term->created_at->isoFormat('MMM Do Y')}}</h4>
                <h4 class="fs-5">Welcome to Electronic Works</h4>
                <p>{!! $term->text !!}</p>

            </div>

        </div>
    </section>
@endsection
