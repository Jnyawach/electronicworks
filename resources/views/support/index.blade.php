@extends('layouts.main')
@section('title','Help & Support')
@section('content')
    <div class="container pt-3">
        <!--Delayed projects-->
        <h5 class="text-center mt-5">All Frequently asked questions</h5>
        <hr>
        @include('includes.status')
        <div class="row mt-3">
            @if($categories->count()>0)
                @foreach($categories as $category)
                    <div class="col-8 mx-auto">
                        <h4 class="mt-5 fs-5 fw-bold text-capitalize">{{$category->name}}</h4>
                        @foreach($category->faqs as $faq)
                            <div class="accordion accordion-flush" id="accordion{{$faq->id}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading{{$faq->id}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{$faq->id}}" aria-expanded="false"
                                                aria-controls="flush-collapse{{$faq->id}}">
                                            {{$faq->question}}


                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{$faq->id}}" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading{{$faq->id}}" data-bs-parent="#accordion{{$faq->id}}">
                                        <div class="accordion-body">
                                            <p>
                                                {!! $faq->answer !!}
                                            </p>


                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endforeach


                    </div>
                @endforeach
            @endif
        </div>


    </div>
@endsection
