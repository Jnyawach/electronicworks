@extends('layouts.client_layout')
@section('title','Projects')
@section('content')
    <section>
        <div class="p-3">
            <div class="row pb-5">

                <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
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
                            <h5 class="m-2">Under Bidding</h5>
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
                                                        {{\Carbon\Carbon::parse($project->writer_delivery)
                                                    ->diffForHumans()}}&nbsp;<span>Payment</span>
                                                        ${{number_format($project->words/300*$project->cost, 2)}}
                                                        &nbsp;<span>Posted:</span>{{$project->created_at ->diffForHumans()}}
                                                    </h4>
                                                    <p>{!!Illuminate\Support\Str::limit($project->instruction, 110)!!}</p>
                                                    <h4 class="fs-6 fw-bold m-1"><span>Words:</span> {{$project->words}}&nbsp;&nbsp;
                                                        <span>Category:</span> {{$project->descipline->name}}&nbsp;&nbsp;
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
    </section>
@endsection
