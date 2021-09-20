@extends('layouts.client_layout')
@section('title', $project->sku)
@section('content')
    @include('includes.status')
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <!--In progress card-->
                    <div class="card  shadow-sm mb-5 view-order">
                        <div class="card-header d-inline-flex">
                            <h5><span>{{$project->sku}}</span> {{$project->title}}</h5>
                            @if(!isset($project->writers->name))
                                <a href="{{route('jobs.edit', $project->id)}}" class="btn-sm
                                ms-auto m-0">
                                    <i class="fas fa-pen-square me-2"></i>Edit
                                </a>

                        @endif
                        <!--
                            Please remember to deactivate edit button after project is assigned
                            -->

                        </div>
                        <div class="card-body">
                            <div class="d-inline-flex project-header">
                                <h5><span>Category:</span> {{$project->descipline->name}}</h5>
                                <h5 class="ms-3"><span>Deadline:</span>{{\Carbon\Carbon::parse
                                ($project->client_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                                <h5 class="ms-3"><span>Words:</span>{{$project->words}}</h5>
                                <h5 class="ms-3"><span>Posted On:
                                    </span>{{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>


                            </div>
                            <div class="mt-3">
                                <h5>Instructions</h5>
                                <p>{!! $project->instruction !!}</p>

                                <h5 class="bg-light p-2">Status:&nbsp;<span>
                                        @if(isset($project->writers->name))
                                            {{$project->writers->name}}/<span
                                                class="text-success">{{$project->progress->name}}</span>
                                        @else
                                            <span class="text-danger">
                                                 {{$project->progress->name}}
                                            </span>
                                            /{{$project->bids->count()}}Bids
                                        @endif
                                    </span>&nbsp;


                                </h5>
                                <hr class="dotted">
                                <h5 class="mt-5">Attached Files</h5>
                                @if($project->getMedia('materials'))
                                    @foreach($project->getMedia('materials') as $media)
                                        <a href="{{$media->getUrl()}}" target="_blank"><span><i class="fas fa-folder me-2"></i></span>{{$media->name}}</a>
                                    @endforeach
                                @else
                                    <p>No files attached</p>
                                @endif

                                

                            </div>


                        </div>

                    </div>
                    <!--End of progress card-->

                </div>


            </div>

@endsection

