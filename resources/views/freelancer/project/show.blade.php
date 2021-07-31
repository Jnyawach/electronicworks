@extends('layouts.writer')
@section('title', 'Bid for Projects')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>{{$project->title}}</h5>
            </div>
            <div class="card-body">
                <div class="d-inline-flex project-header">
                    <h5><span>Category:</span> {{$project->descipline->name}}</h5>

                    <h5 class="ms-3"><span>Submission:</span>{{\Carbon\Carbon::parse
                                ($project->writer_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                    <h5 class="ms-3"><span><i class="fas fa-paperclip"></i>
                                    </span>{{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                </div>
                @include('includes.status')
                <div class="row mt-3 p-3">
                    <div class="col-sm-12 col-md-8 col-lg-8">
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

                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 green-body pt-3">

                        <form class="text-center" action="{{route('bidding')}}" method="POST">
                            @csrf
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <button type="submit" class="btn btn-primary">
                                Bid for this project</button>
                        </form>

                        <h4 class="mt-5 fw-bold">Total Bids Submitted: <span>{{count($project->bid)}}</span></h4>
                        <hr class="dropdown-divider">
                        <h5 class="fw-bold">About this client</h5>
                        <p>{{$clientProject}} projects posted</p>
                        <p>{{$active}} jobs active now</p>
                        <p>More than Kshs. 10,000 spent</p>
                        <p>Member since {{$project->clients->created_at->isoFormat('MMM Do Y')}}</p>
                        <hr>
                        <h5 class="fw-bold">Project link</h5>
                        <p>{{url()->current()}}</p>



                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
