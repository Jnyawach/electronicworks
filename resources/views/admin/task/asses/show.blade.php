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
                            @if(is_null($project->revision))
                            <span class="float-end text-danger">Under Review</span>
                                @else
                                <span class="float-end text-danger">Revision</span>
                                @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-inline-flex project-header">
                            <h5 class="fw-bold"><span>Category:</span> {{$project->descipline->name}}</h5>
                            <h5 class="ms-3 fw-bold"><span>Deadline:</span>{{\Carbon\Carbon::parse
                                ($project->writer_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                            <h5 class="ms-3 fw-bold">
                                <span>Posted On:</span>{{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}
                            </h5>

                            <h5 class="ms-3 fw-bold">
                                <span>Payout:</span>$.{{$project->client_pay}}
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
                                <h5>Submission</h5>


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
                                <form action="{{route('asses.update',$project->submission->id)}}" method="POST">
                                    @method('PATCH')
                                    @csrf

                                    <input type="hidden" value="{{$project->client_id}}" name="client">
                                    <input type="hidden" value="{{$project->id}}" name="project">
                                    <input type="hidden" value="{{$project->writer_id}}" name="writer">
                                    <button type="submit" class="btn btn-primary">Submit to Client</button>
                                </form>
                                <h5 class="mt-3">Or return for revision with comments</h5>
                                <form action="{{route('asses.update',$project->submission->id)}}" method="POST">
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
                                                    {{old('reason')}}
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


