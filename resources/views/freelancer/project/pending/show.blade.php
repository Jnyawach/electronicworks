@extends('layouts.writer')
@section('title', $project->sku)
@section('content')
    @include('includes.ckeditor')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>{{$project->title}}
                    @if(\Carbon\Carbon::now()<=$project->updated_at->addMinutes(15))
               <button type="submit" class="float-end btn-sm btn-danger " form="unclaim">Un-claim Project</button>
                @endif
                </h5>
                <form action="{{route('pending.update',$project->id)}}" id="unclaim" method="POST">
                    @method('PATCH')
                    @csrf

                </form>
            </div>
            <div class="card-body">
                <div class="d-inline-flex project-header">
                    <h5><span>Category:</span> {{$project->descipline->name}}</h5>
                    <h5 class="ms-3"><span>Deadline:</span>{{\Carbon\Carbon::parse
                                ($project->writer_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                    <h5 class="ms-3">
                        <span>Posted On:</span>{{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}
                    </h5>

                    <h5 class="ms-3">
                        <span>Payout:</span>$.{{$project->writer_pay}}

                    </h5>
                </div>
                @include('includes.status')
                <div class="row mt-3 p-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h4>Use <span>{{$project->citation->name}}</span> citation style</h4>
                        <p>{!! $project->instruction !!}</p>
                        <hr class="dotted">
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
                        <p>Please adhere to the following guidelines when submitting your work.</p>
                        <ol>
                            <li>Strictly follow the instruction as provided by the client</li>
                            <li>Ensure that word count is met.</li>
                            <li>Comply with the deadline as indicated.</li>
                            <li>Ensure that your work is original. A similarity rate/plagiarism of below 10% is
                                acceptable </li>
                            <li>Please zip multiple files before upload</li>
                            <li>Failure to will lead to penalties that will affect your account rating</li>
                        </ol>
                       <h5>Submission form</h5>
                        <form action="{{route('pending.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <input type="hidden" value="{{$project->id}}" name="project">
                            <input type="hidden" value="{{Auth::id()}}" name="writer">
                            <div class="form-group required mt-4">
                                <label for="comment" class="control-label">Add Comment(optional):</label>
                                <textarea class="form-control complete" id="comment"
                                          style="height: 300px" name="comment">
                                                    {{old('comment')}}
                                                </textarea>
                                <small class="text-danger">
                                    @error('comment')
                                    {{ $message }}
                                    @enderror
                                </small>
                                <small>This may include:instructions to the client, how the work is packaged and or more
                                </small>
                            </div>
                            <div class="form-group mt-4">
                                <label for="materials" class="form-label">Attach Files:</label>
                                <input class="form-control form-control-lg" id="materials"
                                       type="file" style="width: 400px" name="attachment" required>
                                <small class="text-danger">
                                    @error('attachment')
                                    {{ $message }}
                                    @enderror
                                </small>
                                <small>Please zip the multiple files before upload.
                                    Total file size should not exceed 10MB</small>

                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit for review
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'comment', );
    </script>
@endsection
