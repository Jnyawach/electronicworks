@extends('layouts.writer')
@section('title','Finished Projects')
@section('content')
    <div>
        <div class="row pb-5">
            <div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
                <div class="card jobs">
                    <div class="body pt-3">
                        <h5 class="m-2 fw-bold">Completed Projects <span>({{$projects->count()}})</span></h5>
                        <hr class="dropdown-divider">
                        <div class="row">
                            @if($projects->count()>0)
                                @foreach($projects as $project)
                                    <a href="{{route('finished.show',$project->slug)}}"
                                       class="text-decoration-none"
                                       title="click to see details">
                                        <div class="col-sm-12 mx-auto">
                                            <div class="conte p-2">
                                                <h5 class="m-1"><span
                                                        class="fw-bold">{{$project->sku}}</span>
                                                    {{$project->title}}</h5>
                                                <h4 class="fs-6 fw-bold m-1">Submitted
                                                    {{$project->submission->created_at->diffForHumans()}}&nbsp;<span>Payment</span> ${{$project->writer_pay}}

                                                    &nbsp;<span>Posted:</span>{{$project->created_at ->diffForHumans()}}
                                                </h4>
                                                <p>{!!Illuminate\Support\Str::limit($project->instruction, 110)!!}</p>
                                                <h4 class="fs-6 fw-bold m-1"><span>Words:</span> {{$project->words}}&nbsp;&nbsp;
                                                    <span>Category:</span> {{$project->descipline->name}}&nbsp;
                                                    &nbsp;

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

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
