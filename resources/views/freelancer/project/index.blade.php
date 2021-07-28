@extends('layouts.writer')
@section('title','Projects')
@section('content')
    <div class="p-3">
        <div class="row pb-5">
            <div class="col-sm-12 col-md-3 col-lg-3 mx-auto">
                <h5>Find Projects</h5>
                <hr>
                <h4 class="fw-bold">My Categories</h4>
                @if(isset(Auth::user()->desciplines))
                    <ul class="m-0 cate p-0">
                        @foreach(Auth::user()->desciplines as $field)
                        <li class="list-unstyled">
                            <a href="{{route('filters',$field->slug)}}" class="text-decoration-none">
                                <h5 class="fw-bold">{{$field->name}}</h5>
                            </a>
                        </li>
                            @endforeach
                    </ul>

                @endif
            </div>

            <div class="col-sm-12 col-md-9 col-lg-9 mx-auto">
                <ul class="nav nav-fill">
                    <li class="nav-item mb-3">
                        <form class="d-flex" action="{{route('filter')}}" method="get">
                            <input class="form-control complete" type="search"
                                   placeholder="Search titles" name="title" required>

                            <button class="btn btn-primary ms-1" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <div class="card jobs">
                    <div class="body pt-3">
                        <h5 class="m-2">Most Recent for you</h5>
                        <hr class="dropdown-divider">
                        <div class="row">
                @if(isset($projects))
                    @foreach($projects as $project)
                        <a href="{{route('project.show',$project->slug)}}" class="text-decoration-none"
                           title="click to see details">
                            <div class="col-sm-12 mx-auto">
                                <div class="conte p-2">
                                <h5 class="m-1">{{$project->title}}</h5>
                                <h4 class="fs-6 fw-bold m-1">Required in
                                    {{\Carbon\Carbon::parse($project->writer_delivery)
                           ->diffForHumans()}}&nbsp;<span>Payment</span> Kshs.{{$project->words/300*350}}
                                    &nbsp;<span>Posted:</span>{{$project->created_at ->diffForHumans()}}
                                </h4>
                                <p>{!!Illuminate\Support\Str::limit($project->instruction, 110)!!}</p>
                                <h4 class="fs-6 fw-bold m-1"><span>Words:</span> {{$project->words}}&nbsp;&nbsp;
                                    <span>Category:</span> {{$project->descipline->name}}&nbsp;&nbsp;
                                    <span>Project ID:</span> {{$project->id}}&nbsp;
                                    <span>Bids:</span> {{count($project->bid)}}
                                </h4>

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
