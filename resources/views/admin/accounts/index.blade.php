@extends('layouts.admin_layout')
@section('title','Accounts')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <section class="green-body p-4 shadow-sm">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                            <div class="card shadow-sm">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">$. {{$account->balance}}</h4>
                                    <h5 class="fs-5">ACCOUNT BALANCE</h5>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                            <div class="card shadow-sm">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">$. {{$account->writer}}</h4>
                                    <h5 class="fs-5 text-danger">OWED TO WRITERS</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                            <div class="card shadow-sm">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">$. {{$account->client}}</h4>
                                    <h5 class="fs-5 text-success">OWED BY CLIENTS</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!--Unpaid Orders-->
                <section>
                    <div class="row mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header p-3">
                                    <h5 style="font-size: 18px">Orders pending payment<span
                                            class="float-end">12</span></h5>
                                </div>
                                <div class="card-body">
                                    <table id="table_id6" class="display">
                                        <thead>
                                        <tr>
                                            <th>SKU</th>
                                            <th>Amount($)</th>
                                            <th>Order Date</th>
                                            <th>Delivery date</th>
                                            <th>Client</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($orders->count()>0)
                                            @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->sku}}</td>
                                            <td>{{$order->client_pay}}</td>
                                            <td>{{$order->created_at->isoFormat('MMM Do Y')}}</td>
                                            <td>{{\Carbon\Carbon::parse($order->client_delivery)->isoFormat('MMM Do Y')
                                            }}</td>
                                            <td>{{$order->clients->name}}</td>
                                            <td>N/A</td>
                                        </tr>
                                        @endforeach
                                        @endif

                                        <tr>
                                            <th>SKU</th>
                                            <th>Amount($)</th>
                                            <th>Order Date</th>
                                            <th>Delivery date</th>
                                            <th>Client</th>
                                            <th>Action</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready( function () {
            $('#table_id6').DataTable();
        } );
    </script>
    @endsection
