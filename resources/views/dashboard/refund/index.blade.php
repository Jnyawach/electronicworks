@extends('layouts.client_layout')
@section('title','Projects')
@section('content')
    <div>
        @include('includes.status')
        <div class="row pb-5">
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="card jobs">
                    <div class="body pt-3">

                        <h5 class="m-2 fw-bold">Refunded Projects</h5>
                        <hr class="dropdown-divider">
                        <div class="row">
                            @if(isset($refunds))
                                @foreach($refunds as $refund)
                                    <a href="{{route('refund.show',$refund->project->slug)}}" class="text-decoration-none"
                                       title="click to see details">
                                        <div class="col-sm-12 mx-auto">
                                            <div class="conte p-2">
                                                <h5
                                                    class="m-1"><span class="fw-bold"
                                                    >{{$refund->project->sku}}</span> {{$refund->project->title}}</h5>
                                                <h4 class="fs-6 fw-bold m-1">Required
                                                    {{\Carbon\Carbon::parse($refund->project->client_delivery)
                                                ->diffForHumans()}}&nbsp;
                                                    &nbsp;<span>Posted:</span>{{$refund->project->created_at ->diffForHumans()}}
                                                </h4>
                                                <p>{!!Illuminate\Support\Str::limit($refund->project->instruction, 110)!!}</p>
                                                <h4 class="fs-6 fw-bold m-1"><span>Words:</span> {{$refund->project->words}}&nbsp;&nbsp;
                                                    <span>Category:</span> {{$refund->project->descipline->name}}&nbsp;&nbsp;

                                                </h4>
                                                @if($refund->status==0)
                                               <h4 class="mt-3 fw-bold">Refund: <span class="text-success">Pending</span></h4>
                                                @elseif($refund->status==1)
                                                    <h4 class="mt-3 fw-bold">Refund: <span class="text-success">Approved</span></h4>
                                                @elseif($refund->status==2)
                                                    <h4 class="mt-3 fw-bold">Refund: <span class="text-success">Rejected</span></h4>
                                                @endif
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
                            {{ $refunds->links() }}
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection



