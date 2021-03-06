@extends('layouts.admin_layout')
@section('title','Projects')
@section('content')
    @include('includes.ckeditor')
    <div class="dashboard-wrapper green-body pt-5 pb-5">
        <div class="container pt-3 pl-3 dashboard">
            @include('includes.status')
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h5>{{$project->title}}
                            <span class="float-end text-danger">Completed</span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-inline-flex project-header">
                            <h5><span>Category:</span> {{$project->descipline->name}}</h5>
                            <h5 class="ms-3"><span>Submitted On:</span>{{\Carbon\Carbon::parse
                                ($project->submission->created_at)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                            <h5 class="ms-3">
                                <span>Posted On:</span>{{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}
                            </h5>

                            <h5 class="ms-3">
                                <span>Payout:</span>${{$project->writer_pay}}
                            </h5>
                        </div>
                        <div class="row mt-3 p-3">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h4>Use <span>{{$project->citation->name}}</span> citation style</h4>
                                <p>{!! $project->instruction !!}</p>

                                <h5 class="mt-4">Attached Files</h5>
                                @if($project->getMedia('materials'))
                                    @foreach($project->getMedia('materials') as $media)
                                        <a href="{{$media->getUrl()}}" target="_blank"><span><i class="fas fa-folder me-2"></i></span>{{$media->name}}</a>
                                    @endforeach
                                @else
                                    <p>No files attached</p>
                                @endif
                                <hr class="dotted">
                                <h5>Submitted</h5>
                                <h4>Writer:<span>{{$project->writers->name}}
                                        {{$project->writers->last_name}}</span></h4>
                                <h4>Client:<span>{{$project->clients->name}}
                                        {{$project->clients->last_name}}</span></h4>
                                <h4>Attached Comments</h4>
                                <p>{!! $project->submission->comment? $project->submission->comment:'No comments attached'
                        !!}</p>
                                <h4>Attached Files</h4>
                                <a href="{{$project->submission->getFirstMedia('attachment')->getUrl()}}"
                                   target="_blank"><span><i
                                            class="fas fa-folder
                        me-2"></i></span>{{$project->submission->getFirstMedia('attachment')->name}}</a>
                                <hr class="dotted">
                                @if(is_null($review))

                                    <form class="w-100 green-body p-3" action="{{route('reviewSubmit')}}" method="POST">
                                        <h5 class="fw-bold">Be the first to review this work</h5>
                                        @csrf
                                        <input type="hidden" value="{{$project->id}}" name="project">
                                        <input type="hidden" value="{{$project->writer_id}}" name="writer">
                                        <div class="form-group">
                                            <h4 class="m-0 p-0">Rating:</h4>
                                            <div class="stars">
                                                <input class="star star-5" id="star-5" type="radio" name="stars"
                                                       value="5"/>
                                                <label class="star star-5" for="star-5"></label>
                                                <input class="star star-4" id="star-4" type="radio" name="stars"
                                                       value="4"/>
                                                <label class="star star-4" for="star-4"></label>
                                                <input class="star star-3" id="star-3" type="radio" name="stars"
                                                       value="3"/>
                                                <label class="star star-3" for="star-3"></label>
                                                <input class="star star-2" id="star-2" type="radio" name="stars"
                                                       value="2"/>
                                                <label class="star star-2" for="star-2"></label>
                                                <input class="star star-1" id="star-1" type="radio" name="stars"
                                                       value="1"/>
                                                <label class="star star-1" for="star-1"></label>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <textarea name="comment" style="height: 100px"
                                                          placeholder="Leave a comment(optional)"
                                                          class="form-control"></textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary">Post Review</button>
                                        </div>

                                    </form>
                                @else
                                    <div class="review-block">
                                        <h5 class="fw-bold">Reviews</h5>
                                        <div class="rating-star">
                                            @for($i = 0; $i < 5; $i++)
                                                <span><i class="fa{{ $review->stars  <= $i ? 'r' : '' }} fa-star"></i></span>
                                            @endfor
                                        </div>
                                        <p class="review-text font-italic m-0">{{$review->comment}}</p>
                                        <p class="text-success mt-2">By {{$review->clients->name}} on {{$review->created_at->isoFormat('M-D-Y')}}</p>


                                    </div>

                                @endif



                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'reason', );
    </script>
@endsection



