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
                            <span class="float-end text-danger">Revision Review</span>
                        </h5>
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
                                <span>Payout:</span>Ksh.{{$project->order->amount}}
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
                                <h5>Initial Submission</h5>
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



