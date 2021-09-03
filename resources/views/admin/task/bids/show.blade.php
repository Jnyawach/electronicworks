@extends('layouts.admin_layout')
@section('title','Projects')
@section('content')
    <div class="dashboard-wrapper green-body pt-5 pb-5">
        <div class="container pt-3 pl-3 dashboard">
            @include('includes.status')
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <!--In progress card-->
                    <div class="card  shadow-sm mb-5 view-order">
                        <div class="card-header d-inline-flex">
                            <h5><span>{{$project->sku}}</span> {{$project->title}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-inline-flex project-header">
                                <h5><span>Category:</span> {{$project->descipline->name}}</h5>
                                <h5 class="ms-3"><span>Deadline:</span>{{\Carbon\Carbon::parse
                                ($project->client_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                                <h5 class="ms-3"><span>Submission:</span>{{\Carbon\Carbon::parse
                                ($project->writer_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
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
                                    Payout: <span>${{$project->client_pay}}</span>&nbsp;
                                    Writer Pay: <span>${{$project->writer_pay}}</span>
                                    Client: <span>{{$project->clients->name}}</span>
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
                                    <h5>Writers who have submitted a proposal for this project</h5>
                                    @foreach($project->bids as $bid)

                                        <div class="mt-5 row">
                                            <div class="col-sm-12 col-md-5 col-lg-5">
                                                <img src="{{url($bid->user->getFirstMedia('avatar')?
                                                $bid->user->getFirstMedia('avatar')
                                                ->getUrl('avatar_icon'):'/images/no-image.png' )}}"
                                                     class="rounded float-start img-fluid me-2" style="height: 60px">
                                                <h5 class="mb-0">{{$bid->user->name}}</h5>
                                                <h5 class="m-0">Projects completed: 80later</h5>

                                                @if($bid->user->reviewing->count()>0)
                                                    <h4 class="mt-0 pt-0" style="font-family: 'Avenir Bold'">
                                                        {{$bid->user->reviewing->sum('stars')/$bid->user->reviewing->count()}} /5

                                                        @for($i = 0; $i < 5; $i++)
                                                            <i class="fa{{ $bid->user->reviewing->sum('stars')/$bid->user->reviewing->count()  <= $i ? 'r' : '' }} fa-star"></i>
                                                        @endfor
                                                    </h4>
                                                @else
                                                    <h4>No Reviews</h4>
                                                @endif
                                            </div>

                                            <div class="col-sm-12 col-md-5 col-lg-5">
                                                <form class="ms-auto m-0" action="{{route('assign',$project->id)}}"
                                                      method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" value="{{$bid->user_id}}" name="writer">
                                                    <input type="hidden" value="{{$bid->id}}" name="bid">

                                                    <button type="submit" class=" btn-primary btn-sm m-0">Assign<i
                                                            class="fas fa-long-arrow-alt-right ms-2"></i></button>

                                                </form>
                                            </div>


                                        </div>
                                        <hr class="dotted">
                                    @endforeach



                                </div>

                            </div>


                        </div>

                    </div>
                    <!--End of progress card-->

                </div>


            </div>
        </div>
    </div>
@endsection


