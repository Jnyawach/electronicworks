@extends('layouts.writer')
@section('title','Projects')
@section('content')
    <div class="container green-body p-3">
        <div class="row pb-5">
            @if(isset($projects))
                @foreach($projects as $project)
                    <a href="{{route('project.show',$project->slug)}}" class="text-decoration-none">
                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                    <h5>{{$project->title}}</h5>
                            <h4 class="fs-6 fw-bold">Required in
                                {{\Carbon\Carbon::parse($project->writer_delivery)
                       ->diffForHumans()}}&nbsp;<span>Payment</span> Kshs.{{$project->words/300*350}}
                                &nbsp;<span>Posted:</span>{{$project->created_at ->diffForHumans()}}
                            </h4>
                    <p>{!!Illuminate\Support\Str::limit($project->instruction, 110)!!}</p>
                    <h4 class="fs-6 fw-bold"><span>Posted by:</span>{{$project->clients->name}}</h4>



                    <hr class="dropdown-divider">
                </div>
                    </a>

                @endforeach
                @endif
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-8 mx-auto text-center pagination">
                    {{ $projects->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
