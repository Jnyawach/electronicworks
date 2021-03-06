@extends('layouts.main')
@section('title','Privacy Policy')
@section('content')
    <section class="mt-5 pt-3">
        <h5 class="mt-5 text-center">Privacy Policy</h5>
        <div class="row">
            <div class="col-10 mx-auto">
                <h4 class="fw-bold">{{$term->created_at->isoFormat('MMM Do Y')}}</h4>
                <h4>Welcome to Electronic Works</h4>
                <p>{!! $term->text !!}</p>

            </div>
        </div>
    </section>
@endsection
