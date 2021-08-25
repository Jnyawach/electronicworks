@extends('layouts.main')
@section('title','Why Electronic Works')
@section('body-class','green-body')
@section('content')
    <section class="pt-5">
        <div class="container mt-5 about-card">
            <div class="row">
                <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">

                            <h5>Why Electronic Works?</h5>
                    <p>
                    Our most valuable resource is our people.
                    Diversity of background, ideas, options, and
                    life experiences. We are open to ideas and taking risks
                    because all this is learning and mastery. This is why we are
                    dedicated to research and innovation to ensure that what we
                    deliver to our clients is the best.</p>
                    <p>At Electronic Works, be confident to get:</p>
                    <ol>
                        <li>The best quality papers</li>
                        <li>Original and unique content</li>
                        <li>Right on-time delivery</li>
                        <li>Original and based on proper argumentation</li>

                    </ol>
                    <section>
                        <div class="container mt-4 pt-5">
                            <h2>Expert in over {{$fields->count()}} Fields</h2>
                            <div class="row mt-5">
                                @foreach($fields->chunk(7) as $chunk)
                                    @foreach($chunk as $field)
                                        <div class="col-sm-11 col-md-6 col-lg-6">
                                            <p style="line-height: normal; font-size: 15px"><span class="right-pad"><i class="fas fa-caret-right"></i></span>{{$field->name}}</p>

                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                    @include('includes.statistics')

                </div>
            </div>
        </div>
    </section>
    <!---Beginning of Reviews-->


    <section class="feedback mt-5">
        <div class="container p-5">
            <h2 class="text-center mb-5">What clients say about Us</h2>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($reviews as $photo)
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" ></li>
                   @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($reviews as $key=>$review)
                    <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                        <div class="row m-5">
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>Client Feedback &nbsp;&nbsp;<span>
                                @for($i = 0; $i < 5; $i++)
                                            <i class="fa{{ $review->stars  <= $i ? 'r' : '' }} fa-star"></i>
                                        @endfor
                                    {{$review->stars}}/5

                      </span></h6>
                                <p>{{Coduo\PHPHumanizer\StringHumanizer::truncate($review->comment,70,'...')}}</p>
                                <h6><span>Submitted {{$review->created_at->diffForHumans()}}</span></h6>

                            </div>
                            <div class="col-sm-11 col-md-2 col-lg-1 mx-auto">
                                <hr style="width: 1px; height: 100px">
                            </div>
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>{{$review->project->title}}</h6>
                                <p>{{$review->project->descipline->name}}, ID. {{$review->project->sku}}</p>
                                <div class="d-inline-flex">
                                    <img src="{{url($review->writers->getFirstMedia('avatar')?
                                                $review->writers->getFirstMedia('avatar')
                                                ->getUrl('avatar_icon'):'/images/no-image.png' )}}" class="img-fluid"  style="height: 50px">
                                    <p class="m-2">Writer: {{$review->writers->name}}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

    </section>

    <!--End of Body-->
@endsection
