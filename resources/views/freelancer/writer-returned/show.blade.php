@extends('layouts.writer')
@section('title', $project->sku)
@section('content')
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
                                <span>Payment:</span>${{$project->writer_pay}}
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
                                <div class="submission">
                                    <h5>Submission</h5>
                                    <h4>Attached Comments</h4>
                                    <p>{!! $project->submission->comment? $project->submission->comment:'No comments attached'
                                 !!}</p>
                                    <h4>Attached Files</h4>
                                    <a href="{{$project->submission->getFirstMedia('attachment')->getUrl()}}"
                                       target="_blank" class="text-decoration-underline"><span><i
                                                class="fas fa-folder
                        me-2"></i></span>{{$project->submission->getFirstMedia('attachment')->name}}-(click to
                                        download)</a>
                                    <hr class="dotted">
                                    <h5>Reasons for Return</h5>
                                    <p>{!! $project->refunds->reason !!}</p>
                                    <a href="{{$project->refunds->getFirstMedia('evidence')->getUrl()}}"
                                       target="_blank" class="text-decoration-underline"><span><i
                                                class="fas fa-folder me-2"></i></span>
                                     {{$project->refunds->getFirstMedia('evidence')->name}}-see attached file</a>


                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

