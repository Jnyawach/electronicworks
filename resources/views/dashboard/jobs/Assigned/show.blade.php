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
                        <h5 class="ms-3"><span><i class="fas fa-paperclip"></i>
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
                        <hr>
                        <div class="mt-4">
                            <h5>Pre-assigned Writer</h5>

                            <div class="mt-5 row">
                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        <img src="{{url($project->writers->getFirstMedia('avatar')?
                                                $project->writers->getFirstMedia('avatar')
                                                ->getUrl('avatar_icon'):'/images/no-image.png' )}}"
                                             class="rounded float-start img-fluid me-2" style="height: 60px">
                                        <h5 class="mb-0">{{$project->writers->name}}</h5>
                                        <h5 class="m-0">Projects completed: 80later</h5>

                                        <h4 class="mt-0 pt-0" style="font-family: 'Avenir Bold'">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            4.5/5 </h4>
                                    </div>

                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        @if(count($project->bids)==true)
                                            @foreach($project->bids as $bid)
                                        <form class="ms-auto m-0" action="{{route('accept', $project->id)}}"
                                              method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" value="{{$project->writer_id}}" name="writer">
                                            <input type="hidden" value="{{$bid->id}}" name="bid">
                                            <button type="submit" class=" btn-primary btn-sm m-0">Assign<i
                                                    class="fas fa-long-arrow-alt-right ms-2"></i></button>
                                            <h4>Bid Amount: <span>${{$bid->cost}}</span></h4>

                                        </form>
                                            @endforeach
                                            @else
                                            <h4>Writer has not submitted Bid</h4>
                                            @endif
                                    </div>


                                </div>
                                <hr class="dotted">


                        </div>

                    </div>


                </div>

            </div>
            <!--End of progress card-->

        </div>


    </div>

@endsection


