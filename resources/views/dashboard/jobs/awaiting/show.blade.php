@extends('layouts.client_layout')
@section('title', $project->sku)
@section('content')
    @include('includes.status')
    <div>
        <div class="container pt-3 pl-3 dashboard">
            @include('includes.status')
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <!--In progress card-->
                    <div class="card  shadow-sm mb-5 view-order">
                        <div class="card-header">
                            <h5><span>{{$project->sku}}</span> {{$project->title}}
                                <span class="float-end fw-bold">Under Progress</span>
                            </h5>

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
                                    Payout: <span>${{$project->words/300*$project->cost}}</span>&nbsp;
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
                                    <h5>Writer handling the project</h5>
                                    <div class="mt-5 row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <img src="{{url($project->writers->getFirstMedia('avatar')?
                                                $project->writers->getFirstMedia('avatar')
                                                ->getUrl('avatar_icon'):'/images/no-image.png' )}}"
                                                 class="rounded float-start img-fluid me-2" style="height: 60px">
                                            <a href="{{route('writer.show',$project->writer_id)}}">
                                                <h5 class="mb-0">
                                                    {{$project->writers->name}}</h5>
                                            </a>

                                            <h5 class="m-0">Projects completed: {{$project->writers->jobs->count()}}</h5>

                                            @if($project->writers->reviewing->count()>0)
                                                <h4>
                                                    {{$project->writers->reviewing->sum('stars')/$project->writers->reviewing->count()}} /5

                                                    @for($i = 0; $i < 5; $i++)
                                                        <i class="fa{{ $project->writers->reviewing->sum('stars')/$project->writers->reviewing->count()  <= $i ? 'r' : '' }} fa-star"></i>
                                                    @endfor
                                                </h4>
                                            @else
                                                <h4>No Reviews</h4>
                                            @endif
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <form class="ms-auto m-0">
                                                        <button type="submit" class="btn btn-outline-primary rounded-0">Request
                                                            progress</button>

                                                    </form>
                                                </li>
                                                <li class="nav-item">
                                                    <form class="ms-auto m-0">
                                                        <button type="submit" class="btn btn-outline-primary rounded-0">Request
                                                            submission</button>

                                                    </form>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="btn btn-outline-primary rounded-0">Chat with the
                                                        writer</a>
                                                </li>

                                            </ul>


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
        </div>
    </div>
@endsection
