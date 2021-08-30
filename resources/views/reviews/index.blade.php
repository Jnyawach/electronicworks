@extends('layouts.main')
@section('title','Reviews')
@section('body-class','green-body')
@section('content')
    <!-- start of Body-->
    <!--Beginning review body-->
    <section class="mb-5 mt-5 pt-3">
        <div class="container mt-5 review">
            <div class="row">
                <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                    <h5>Latest Reviews</h5>
                    <hr>
                    @if($reviews->count()>0)
                        @foreach($reviews as $review)
                    <div class="card shadow-sm mt-3">
                        <div class="card-header">
                            <h5 class="w-100">{{$review->project->title}}-
                                <span class="text-right">{{$review->created_at->diffForHumans()}}</span></h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-sm-11 col-md-6 col-lg-6">
                                <h4 class="fw-bold">Discipline: <span>{{$review->project->descipline->name}}</span></h4>
                                <div class="row text-left">
                                    <div class="col-3">
                                        <img src="{{url($review->writers->getFirstMedia('avatar')?
                                                $review->writers->getFirstMedia('avatar')
                                                ->getUrl('avatar_icon'):'/images/no-image.png' )}}" class="img-fluid " style="width: 50px">
                                    </div>
                                    <div class="col-8">
                                        <h4 class="m-1">Writer: {{$review->writers->name}}</h4>
                                        <div class="review-block">
                                            <h5 class="fw-bold">
                                                @for($i = 0; $i < 5; $i++)
                                                   <i class="fa{{ $review->stars  <= $i ? 'r' : '' }} fa-star"></i>
                                                @endfor
                                                {{$review->stars}}/5

                                            </h5>

                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="col-sm-11 col-md-6 col-lg-6 mx-auto">
                                <h5>{{$review->project->sku}} Completed&nbsp<i class="fas fa-check-circle"></i></h5>
                                <h5>Feedback:</h5>
                                <p>{{$review->comment}}</p>

                            </div>

                        </div>
                    </div>
                        @endforeach
                    @endif

                </div>
                <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                    @include('includes.statistics')
                </div>
            </div>
        </div>
    </section>
@endsection
