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
                   <form class="ms-auto" action="{{route('cancelled.update',$project->id)}}"
                   method="POST">
                       @method('PATCH')
                       @csrf
                       <input type="hidden" name="progress" value="1">
                       <button type="submit" class="btn-sm btn-primary">Publish Again</button>
                   </form>

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
                            Cost: <span>${{$project->words/300*$project->cost}}</span>&nbsp;

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
                            @if(isset($project->writers->name))
                                <h5>Writer handling the project</h5>
                                <div class="mt-5 row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <img src="{{url($project->writers->getFirstMedia('avatar')?
                                                $project->writers->getFirstMedia('avatar')
                                                ->getUrl('avatar_icon'):'/images/no-image.png' )}}"
                                             class="rounded float-start img-fluid me-2" style="height: 60px">
                                        <h5 class="mb-0">{{$project->writers->name}}</h5>


                                        <h5 class="m-0">Projects completed: 80</h5>

                                        <h4 class="mt-0 pt-0" style="font-family: 'Avenir Bold'">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            4.5/5 </h4>



                                    </div>

                                </div>
                                <hr class="dotted">

                            @else
                                <h5>Writers who have submitted a proposal for this project</h5>
                                @if(count($project->bids)==true)
                                    @foreach($project->bids as $bid)
                                        <div class="mt-5 row">
                                            <div class="col-sm-12 col-md-5 col-lg-5">
                                                <img src="{{url($bid->user->getFirstMedia('avatar')?
                                                $bid->user->getFirstMedia('avatar')
                                                ->getUrl('avatar_icon'):'/images/no-image.png' )}}"
                                                     class="rounded float-start img-fluid me-2" style="height: 60px">
                                                <h5 class="mb-0">{{$bid->user->name}}</h5>
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
                                                <form class="ms-auto m-0" action="{{route('accept', $project->id)}}"
                                                      method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" value="{{$bid->user_id}}" name="writer">
                                                    <button type="submit" class=" btn-primary btn-sm m-0">Assign<i
                                                            class="fas fa-long-arrow-alt-right ms-2"></i></button>

                                                </form>
                                            </div>


                                        </div>
                                        <hr class="dotted">
                                    @endforeach
                                @endif
                            @endif


                        </div>

                    </div>


                </div>

            </div>
            <!--End of progress card-->

        </div>


    </div>

@endsection


