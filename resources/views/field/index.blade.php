@extends('layouts.main')
@section('title', 'Expert Fields')
@section('content')
<section class="pt-5">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-10 mx-auto">
            <h3>Browse All Fields
                <a href="{{route('jobs.create')}}" class="btn btn-primary hire float-end">Post a Project</a></h3>

            <hr class="dropdown-divider mt-5">
            <div class="row mt-5 mb-5">
                @if($fields->count()>0)
                    @foreach($fields as $field)
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <p><span class="right-pad"><i class="fas fa-caret-right"></i></span>{{$field->name}}</p>
                </div>
                    @endforeach
                    @endif
            </div>

        </div>
    </div>
</section>
@endsection
