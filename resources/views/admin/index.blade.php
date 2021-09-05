@extends('layouts.admin_layout')
@section('title', 'Admin Panel')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <!--Header user-projects-invoices-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title ">Users</h5>
                                <h1 class="mb-0">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($users->count())}}</h1>
                                <h4 class="mt-0 fw-bold">Total Users</h4>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($users->where('role_id',3)->count())}}</h5>
                                        <h4 class="mt-0 fw-normal">Writers</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($users->where('role_id',2)->count())}}</h5>
                                        <h4 class="mt-0 fw-normal">Clients</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($users->where('role_id',4)->count())}}</h5>
                                        <h4 class="mt-0 fw-normal">Manager</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title ">Projects</h5>
                                <h1 class="mb-0">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($projects->count())}}</h1>
                                <h4 class="mt-0 fw-bold">Total projects</h4>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($projects->where('progress_id',4)->count())}}</h5>
                                        <h4 class="mt-0 fw-normal">complete</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($projects->where('progress_id',2)->count())}}</h5>
                                        <h4 class="mt-0 fw-normal">progress</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{\Coduo\PHPHumanizer\NumberHumanizer::metricSuffix($projects->where('progress_id',1)->count())}}</h5>
                                        <h4 class="mt-0 fw-normal">Bidding</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title ">Balance</h5>
                                <h1 class="mb-0">${{$store->balanceFloat}}</h1>
                                <h4 class="mt-0 fw-bold">May, 2016</h4>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">${{$users->where('role_id',3)->sum('balanceFloat')}}</h5>
                                        <h4 class="mt-0 fw-normal">Writers</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{$store->balanceFloat}}</h5>
                                        <h4 class="mt-0 fw-normal">Profit</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">{{$users->where('role_id',2)->sum('balanceFloat')}}</h5>
                                        <h4 class="mt-0 fw-normal">Client</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end ofHeader user-projects-invoices-->



            <div class="container ">
                <!--Delayed projects-->
                <div class="row mt-5">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Delayed submission<span class="float-end">{{$delayed->count()}}</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($delayed as $delay)
                                    <tr>
                                        <td>{{$delay->sku}}</td>
                                        <td>{{\Coduo\PHPHumanizer\StringHumanizer::truncate($delay->title, 30, '...')}}
                                        </td>
                                        <td>May 3, 2021 7:14am</td>
                                        <td><a href="{{route('writer.show',$delay->writer_id)}}" class="text-decoration-none text-success">{{$delay->writers->name}}</a> </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Delayed projects-->
                <!--beginning of notifications-->
                <hr>
                <h5>Notifications</h5>
                <div class="row">
                    @if($writers>0)
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 style=" font-size: 18px">

                                </h5> Writer application
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    You {{$writers}} new writer applications
                                </p>
                                <a href="{{route('application.index')}}" class="btn btn-primary hire">View<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                            </div>
                        </div>

                    </div>
                    @endif
                        @if($clients>0)
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 style=" font-size: 18px">
                                    Client application
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    You {{$clients}} new client applications
                                </p>
                                <a href="{{route('application.index')}}" class="btn btn-primary hire">View<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                            </div>
                        </div>

                    </div>
                        @endif

                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 style=" font-size: 18px">
                                    Messages
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    You 3 new messages
                                </p>
                                <a href="#" class="btn btn-primary hire">View<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end of notifications-->

                <!--Revision projects-->

                <div class="row mt-5">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Pending Revisions<span class="float-end">{{$projects->where('progress_id',5)->count()}}</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id2" class="display">
                                    <thead>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects->where('progress_id',5) as $revision)
                                    <tr>
                                        <td>{{$revision->sku}}</td>
                                        <td>
                                            {{\Coduo\PHPHumanizer\StringHumanizer::truncate($revision->title, 100)}}
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($revision->writer_delivery)->diffForHumans()}}</td>
                                        <td><a href="{{route('writer.show',$revision->writer_id)}}" class="text-decoration-none text-success">{{$revision->writers->name}}</a> </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End of Revision projects-->
                <!--completed projects-->
                <div class="row mt-5">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Submitted for Review<span class="float-end">{{$projects->where('progress_id',3)->count()}}</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id3" class="display">
                                    <thead>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects->where('progress_id',3) as $review)
                                    <tr>
                                        <td>{{$review->sku}}</td>
                                        <td>{{\Coduo\PHPHumanizer\StringHumanizer::truncate($review->title, 100)}}}</td>
                                        <td>{{\Carbon\Carbon::parse($review->client_delivery)->diffForHumans()}}</td>
                                        <td><a href="{{route('asses.show',$review->slug)}}" class="text-decoration-none text-success">See details</a> </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end completed projects-->

                <!--Orders Analysis by Month-->
                <div class="row mt-3">
                    <div class="col-12">
                        <h5 class="text-uppercase fs-5">{{Carbon\Carbon::now()->monthName}} ORDER HISTORY</h5>
                        <div>{!! $chart1->renderHtml() !!}</div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id2').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id3').DataTable();
        } );
    </script>
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
