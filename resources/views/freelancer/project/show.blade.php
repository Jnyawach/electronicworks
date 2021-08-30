@extends('layouts.writer')
@section('title', 'Bid for Projects')
@section('content')
    <div class="container">
        @if(Auth::user()->level_id>0)
            @if(Auth::user()->jobs->where('progress_id',2)->count()>=Auth::user()->level->quantity)
                <div class="alert alert-danger p-2" role="alert">
                    <p class="p-0 m-0">You have reached the maximum bid limit! Submit the assigned order
                        before you can bid for another project</p>
                </div>
            @endif
        @endif
        <div class="card">
            <div class="card-header">
                <h5><span class="fw-bold">{{$project->sku}}</span> {{$project->title}}</h5>
            </div>
            <div class="card-body">
                <div class="d-inline-flex project-header">
                    <h5><span>Category:</span> {{$project->descipline->name}}</h5>
                    <h5 class="ms-3"><span>Words:</span> {{$project->words}}</h5>

                    <h5 class="ms-3"><span>Deadline:</span>{{\Carbon\Carbon::parse
                                ($project->writer_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                    <h5 class="ms-3"><span>Posted: </span>
                                   {{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
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
                        @if(is_null($bid))
                            <form action="{{route('bidding')}}" method="POST" class="bidding">
                                @csrf
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                <div class="form-group">
                                    <label for="amount" class="control-label">Bid Amount($):</label>
                                    <input type="text" class="complete form-control" name="amount" value="{{old
                                    ('amount')
                                }}"  @if(Auth::user()->jobs->where('progress_id',2)->count()>=Auth::user()->level->quantity)
                                    disabled @endif>
                                    <small>Bid currency is dollars($)</small>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 form-control"
                                @if(Auth::user()->jobs->where('progress_id',2)->count()>=Auth::user()->level->quantity)
                                    disabled @endif> Bid for this project</button>


                            </form>
                            @else
                            <form action="{{route('bidding')}}" method="POST" class="bidding">
                                @csrf
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                <div class="form-group">
                                    <label for="amount" class="control-label">Bid Amount($):</label>
                                    <input type="text" class="complete form-control" name="amount"
                                           value="{{$bid->amount}}">

                                </div>
                                <button type="submit" class="btn btn-primary mt-3 form-control">Change your Bid</button>
                                <small>Only edit if you are not satisfied with the amount</small>


                            </form>

                            @endif



                        <h4 class="mt-5 fw-bold">Total Bids Submitted: <span>{{count($project->bids)}}</span></h4>
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
