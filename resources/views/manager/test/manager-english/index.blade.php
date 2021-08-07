@extends('layouts.manager_layout')
@section('title', 'Examination')
@section('body-class','green-body')

@section('content')
    <div class="dashboard-wrapper green-body pt-5">

        <div class="container p-5">
            <h5 class="w-100">English Test
                <a href="{{route('manager-english.create')}}" class="float-end text-decoration-none btn-primary btn-sm hire">Create
                    Test</a>
            </h5>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <hr class="dropdown-divider">
            @if($quizes->count()>0)
                @foreach($quizes as$quiz)
                    <div>
                        <h5 style="font-size: 17px"><span>Quiz:</span>{!! $quiz->quiz !!}</h5>
                        <p>A) {!! $quiz->choice_a !!}</p>
                        <p>B) {!! $quiz->choice_b !!}</p>
                        <p>C) {!! $quiz->choice_c !!}</p>
                        <h5 style="font-size: 17px">Correct Answer: {!! $quiz->answer !!}</h5>
                        <div class="d-inline-flex">
                            <a href="{{route('manager-english.edit', $quiz->id)}}" class="btn-sm btn-primary m-1 hire text-decoration-none">Edit
                                <i class="fas fa-external-link-square-alt ms-2"></i></a>


                        </div>
                        <hr class="dropdown-divider">
                    </div>
                @endforeach
            @endif


        </div>
    </div>
@endsection

