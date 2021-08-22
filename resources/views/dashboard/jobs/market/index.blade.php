@extends('layouts.client_layout')
@section('title','Projects')
@section('content')
    <div>
        @include('includes.status')
        <div class="row pb-5">
            <div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
                <div class="card jobs">
                    <div class="body pt-3">

                        <h5 class="m-2 fw-bold">Project(s) undergoing Bidding</h5>
                        <hr class="dropdown-divider">
                        <div class="row">
                            @if(isset($projects))
                                @foreach($projects as $project)
                                    <a href="{{route('jobs.show',$project->slug)}}" class="text-decoration-none"
                                       title="click to see details">
                                        <div class="col-sm-12 mx-auto">
                                            <div class="conte p-2">
                                                <h5
                                                    class="m-1"><span class="fw-bold"
                                                    >{{$project->sku}}</span> {{$project->title}}</h5>
                                                <h4 class="fs-6 fw-bold m-1">Required
                                                    {{\Carbon\Carbon::parse($project->client_delivery)
                                                ->diffForHumans()}}&nbsp;
                                                    &nbsp;<span>Posted:</span>{{$project->created_at ->diffForHumans()}}
                                                </h4>
                                                <p>{!!Illuminate\Support\Str::limit($project->instruction, 110)!!}</p>
                                                <h4 class="fs-6 fw-bold m-1"><span>Words:</span> {{$project->words}}&nbsp;&nbsp;
                                                    <span>Category:</span> {{$project->descipline->name}}&nbsp;&nbsp;
                                                    <span>Bids:</span> {{count($project->bids)}}
                                                </h4>
                                                <div class="d-inline-flex">
                                                    <form action="{{route('cancelled.update',$project->id)}}"
                                                          method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <input type="hidden" name="progress" value="9">
                                                        <button type="submit" class="btn-sm btn-primary">Cancel</button>
                                                    </form>

                                                    <a href="{{route('jobs.edit', $project->id)}}" class="btn-sm
                                                    ms-2 m-0 btn-primary hire text-decoration-none">
                                                        Edit
                                                    </a>
                                                </div>

                                            </div>

                                            <hr class="dropdown-divider">
                                        </div>
                                    </a>

                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="card-footer w-100">
                        <div class="float-end">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection



