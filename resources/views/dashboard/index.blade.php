@extends('layouts.client_layout')
@section('title','Dashboard')
@section('content')
    <!--page content-->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                    <!--In progress card-->
                    <div class="card  shadow-sm m-2">
                        <div class="card-header d-inline-flex">
                            <h5 class="fw-bold">In progress ({{Auth::user()->projects->where('progress_id',2)->count()}}) </h5>
                            <a href="{{route('awaiting.index')}}" class="ms-auto">see all&nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="card-body">
                            @if(Auth::user()->projects->where('progress_id',2)->count()>0)
                                @foreach(Auth::user()->projects->where('progress_id',2) as $progress)
                                    <a href="{{route('awaiting.show',$progress->slug)}}" title="{{$progress->slug}}">
                                        <div class="item ps-2 pt-2 pe-2">
                                            <div class="d-inline-flex w-100">
                                                <h5 class="fs-6 fw-bold"><span class="fs-6">{{$progress->sku}}</span> {{$progress->title}}</h5>

                                            </div>
                                            <p>Status:<span>{{$progress->progress->name}}</span>&nbsp;|&nbsp;Words:<span>{{$progress->words}}</span>
                                                &nbsp;|&nbsp;Deadline:<span>{{\Carbon\Carbon::parse($progress->client_delivery)->diffForHumans()}}</span>&nbsp;|&nbsp;
                                                Payment:<span>${{$progress->client_pay}}</span></p>
                                            <hr class="dropdown-divider">
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p class="card-text">No Assigned projects available</p>
                            @endif

                        </div>
                    </div>
                    <!--End of progress card-->
                    <!--revisions card-->
                    <div class="card  shadow-sm m-2">
                        <div class="card-header d-inline-flex">
                            <h5 class="fw-bold">Revisions ({{Auth::user()->projects->where('progress_id',5)->count()}})</h5>
                            <a href="{{route('returned.index')}}" class="ms-auto">see all&nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="card-body">
                            @if(Auth::user()->projects->where('progress_id',5)->count()>0)
                                @foreach(Auth::user()->projects->where('progress_id',5) as $revision)
                                    <a href="{{route('returned.show',$revision->slug)}}" title="{{$revision->slug}}">
                                        <div class="item ps-2 pt-2 pe-2">
                                            <div class="d-inline-flex w-100">
                                                <h5 class="fs-6 fw-bold"><span class="fs-6">{{$revision->sku}}</span> {{$revision->title}}</h5>

                                            </div>
                                            <p>Status:<span>{{$revision->progress->name}}</span>&nbsp;|&nbsp;Words:<span>{{$revision->words}}</span>
                                                &nbsp;|&nbsp;Deadline:<span>{{\Carbon\Carbon::parse($revision->client_delivery)->diffForHumans()}}</span>&nbsp;|&nbsp;
                                                Payment:<span>${{$revision->client_pay}}</span></p>
                                            <hr class="dropdown-divider">
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p class="card-text">No Revision available</p>
                            @endif

                        </div>
                    </div>
                    <!-- end of revisions-->


                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                    <!--notifications card-->
                    <div class="card m-1 shadow-sm notification">
                        <div class="card-header bg-primary">
                            <h5 class="text-light">{{Auth::user()->name}} {{Auth::user()->last_name}}</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="card-title fw-bold">Account Balance</h5>
                                <h4 class="fw-bold">${{Auth::user()->balanceFloat}}</h4>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="p-3">
                                <h5 class="card-title fw-bold">Details</h5>
                                <h4 class="fw-bold fs-6"><span>Email:</span> {{Auth::user()->email}}</h4>
                                <h4 class="fw-bold fs-6"><span>Member Since:</span> {{Auth::user()->created_at->diffForHumans()}}</h4>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="p-3">
                                <h5 class="card-title fw-bold">Orders</h5>
                                <h4 class="fw-bold"><span>{{Auth::user()->projects->count()}}</span> Total Projects</h4>
                                <h4 class="fw-bold"><span>{{Auth::user()->projects->where('progress_id',1)->count()}}</span> Bidding</h4>
                                <h4 class="fw-bold"><span>{{Auth::user()->projects->where('progress_id',2)->count()}}</span> Progressing</h4>
                                <h4 class="fw-bold"><span>{{Auth::user()->projects->where('progress_id',5)->count()}}</span> Complete</h4>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!--expenditure card-->

    <div class="row mb-5">
        <div class="col-12 mx-auto">
            <div class="card shadow-sm expenditure">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3 p-3">
                            <div>
                                <h5>Orders</h5>
                                <h4 class="fw-bold">{{\Carbon\Carbon::now()->format('M-Y')}}</h4>
                            </div>
                            <div class="mt-5">
                                <h1>$ {{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix(Auth::user()->projects->sum('client_pay'))}}</h1>
                                <h4>Gross Expenditure</h4>
                            </div>
                            <div class="mt-5">
                                <h1>{{Auth::user()->projects->count()}}</h1>
                                <h4>Total Orders</h4>
                            </div>


                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9 p-3">
                            <h5 class="text-uppercase">{{Carbon\Carbon::now()->monthName}} ORDER HISTORY</h5>
                            <div>{!! $chart1->renderHtml() !!}</div>

                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-4 mx-auto">
                            <h1>$ {{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix(Auth::user()->projects->where('payment',1)->sum('client_pay'))}}</h1>
                            <h4>Cleared invoices</h4>
                        </div>
                        <div class="col-4 mx-auto">
                            <h1>$ {{Auth::user()->balanceFloat}}</h1>
                            <h4>Pending invoices</h4>
                        </div>
                        <div class="col-4 mx-auto">
                            <h1>$ {{Auth::user()->getWallet('refund')?Auth::user()->getWallet('refund')->balanceFloat:'0.00'}}</h1>
                            <h4>Refunded invoices</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Notification Toast-->
    @if($notification->count()>0)
        <div class="toast position-fixed bottom-0 end-0 p-3"  role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 11" data-bs-autohide="false">
            <div class="toast-header">

                <strong class="me-auto">Notifications</strong>

                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">

                <small>{{$notification->title}}</small>
                <a href="{{route('client-notification.show',$notification->slug)}}" class="text-success">
                    Read more<i class="fas fa-long-arrow-alt-right ms-2"></i>
                </a>

            </div>
        </div>
    @endif

    <!--expenditure card-->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(".toast").toast('show');
        });
    </script>
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection


