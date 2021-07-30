@extends('layouts.writer')
@section('title','Projects')
@section('content')
    <div>
        <div class="row pb-5">
            <div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
                <div class="card jobs">
                    <div class="body pt-3">
                        <h5 class="m-2 fw-bold">Submitted:<span class="text-danger"> Under Review</span></h5>
                        <hr class="dropdown-divider">
                        <div class="row">
                            @if(isset($submissions))
                                @foreach($submissions as $submission)
                                    <a href="{{route('evaluation.show',$submission->project->slug)}}"
                                       class="text-decoration-none"
                                       title="click to see details">
                                        <div class="col-sm-12 mx-auto">
                                            <div class="conte p-2">
                                                <h5 class="m-1"><span
                                                        class="fw-bold">{{$submission->project->sku}}</span>
                                                    {{$submission->project->title}}</h5>
                                                <h4 class="fs-6 fw-bold m-1">Remaining
                                                    {{\Carbon\Carbon::parse($submission->project->writer_delivery)
                                           ->diffForHumans()}}&nbsp;<span>Payment</span> Kshs.{{$submission->project->words/300*350}}
                                                    &nbsp;<span>Posted:</span>{{$submission->project->created_at ->diffForHumans()}}
                                                </h4>
                                                <p>{!!Illuminate\Support\Str::limit($submission->project->instruction, 110)!!}</p>
                                                <h4 class="fs-6 fw-bold m-1"><span>Words:</span> {{$submission->project->words}}&nbsp;&nbsp;
                                                    <span>Category:</span> {{$submission->project->descipline->name}}&nbsp;
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


