@extends('layouts.client_layout')
@section('title', $project->sku)
@section('content')
    @include('includes.ckeditor')
    <div>
        <div class="container  dashboard">
            @include('includes.status')
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h5>{{$project->title}}
                            <span class="float-end">Completed</span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-inline-flex project-header">
                            <h5><span>Category:</span> {{$project->descipline->name}}</h5>
                            <h5 class="ms-3"><span>Deadline:</span>{{\Carbon\Carbon::parse
                                ($project->client_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                            <h5 class="ms-3">
                                <span>Posted On:</span>{{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}
                            </h5>

                            <h5 class="ms-3">
                                <span>Payout:</span>${{$project->client_pay}}
                            </h5>
                        </div>
                        @include('includes.status')
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
                                <div class="submission">
                                <h5>Submission</h5>
                                <h4>Attached Comments</h4>
                                    <p>{!! $project->submission->comment? $project->submission->comment:'No comments attached'
                                 !!}</p>
                                    <h4>Attached Files</h4>
                                    <a href="{{$project->submission->getFirstMedia('attachment')->getUrl()}}"
                                       target="_blank" class="text-decoration-underline"><span><i
                                                class="fas fa-folder
                        me-2"></i></span>{{$project->submission->getFirstMedia('attachment')->name}}(click to
                                        download)</a>
                                    <hr class="dotted">

                                    <form class="w-100 green-body p-3">
                                            <h5 class="fw-bold">Be the first to review this work</h5>
                                            <input type="hidden" value="{{$project->id}}" name="project">
                                            <div class="form-group">
                                                <h4 class="m-0 p-0">Rating:</h4>
                                                <div class="stars">
                                                    <input class="star star-5" id="star-5" type="radio" name="star"
                                                           value="5"/>
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" name="star"
                                                           value="4"/>
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" name="star"
                                                           value="3"/>
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" name="star"
                                                           value="2"/>
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" name="star"
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
                                </div>
                                    <hr class="dotted">
                                @if(\Carbon\Carbon::now()<=$project->created_at->addMonths(4))


                                <h5 class="mt-3">Ask for revision</h5>
                                <form action="{{route('complete.update',$project->submission->id)}}" method="POST"
                                     >
                                    @method('PATCH')
                                    @csrf

                                    <input type="hidden" value="{{$project->writer_id}}" name="writer">
                                    <input type="hidden" value="{{$project->id}}" name="project">
                                    <input type="hidden" value="{{$project->client_id}}" name="client">
                                    <input type="hidden" value="" name="reason">
                                    <div class="form-group required mt-4">
                                        <label for="reason" class="control-label">Add Comment:</label>
                                        <textarea class="form-control complete" id="reason"
                                                  style="height: 300px" name="reason">
                                                    {{old('comment')}}
                                                </textarea>
                                        <small class="text-danger">
                                            @error('reason')
                                            {{ $message }}
                                            @enderror
                                        </small>

                                    </div>
                                    <div class="form-group required mt-4">
                                        <label for="deadline"  class="control-label">Delivery (in Hours)
                                            :</label><br>
                                        <input type="number" id="deadline" name="deadline"
                                               class="complete" value="{{old('deadline')}}" required
                                               min="1"><br>
                                        <small class="text-danger">
                                            @error('deadline')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                        <small>Please provide revision deadline in hours from now. For
                                            instance 5hrs from now</small>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            Return for Revision
                                        </button>
                                    </div>
                                </form>
                                    @else
                                    <h5 class="mt-3 text-danger">Revision closed for this task</h5>
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


