@extends('layouts.admin_layout')
@section('title','Refund Request')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <h5>Refund Requests</h5>
                <hr class="dropdown-divider">
                <section>
                    <div class="row mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header p-3">
                                    <h5 style="font-size: 18px">Refund Requests<span class="float-end">{{$pendingRefund->count()}}</span></h5>
                                </div>
                                <div class="card-body">
                                    <table id="refund_table" class="display">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>SKU</th>
                                            <th>Amount($)</th>
                                            <th>View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pendingRefund as $pending)
                                            <tr>
                                                <td>{{$pending->created_at->isoFormat('MMM Do Y')}}</td>
                                                <td>{{$pending->project->sku}}</td>
                                                <td>{{$pending->amount}}</td>
                                                <td><a href="{{route('admin-refund.show',$pending->id)}}" class="text-decoration-none text-success">Details</a> </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>SKU</th>
                                            <th>Amount($)</th>
                                            <th>View</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <!--All refunds that have been processed before-->
                <section>
                    <div class="row mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header p-3">
                                    <h5 style="font-size: 18px">Processed Refunds<span class="float-end">{{$refunds->count()}}</span></h5>
                                </div>
                                <div class="card-body">
                                    <table id="all_refund_table" class="display">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>SKU</th>
                                            <th>Amount($)</th>
                                            <th>View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($refunds as $refund)
                                            <tr>
                                                <td>{{$refund->created_at->isoFormat('MMM Do Y')}}</td>
                                                <td>{{$refund->project->sku}}</td>
                                                <td>{{$refund->amount}}</td>
                                                <td><a href="{{route('admin-refund.show',$refund->id)}}" class="text-decoration-none text-success">Details</a> </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>SKU</th>
                                            <th>Amount($)</th>
                                            <th>View</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!--End of all refunds-->
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#refund_table').DataTable();
            $('#all_refund_table').DataTable();
        } );


    </script>
@endsection

