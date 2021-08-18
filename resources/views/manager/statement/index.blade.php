@extends('layouts.manager_layout')
@section('title','Accounts-Writers')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
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
                                    <h4 class="fs-4 fw-bold">
                                        ${{$store->balanceFloat}}
                                    </h4>
                                    <h5 class="fs-5">ACCOUNT BALANCE</h5>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                            <div class="card shadow-sm">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">${{$writers->sum('balanceFloat')}}</h4>
                                    <h5 class="fs-5 text-danger">OWED TO WRITERS</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                            <div class="card shadow-sm">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">
                                        ${{$store->balanceFloat-$writers->sum('balanceFloat')}}</h4>
                                    <h5 class="fs-5 text-success">EARNINGS</h5>

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
                                    <h5 class="fw-bold fs-5">Writer Balances</h5>
                                </div>
                                <div class="card-body">
                                    <table id="table_id6" class="display">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Balance($)</th>
                                            <th>Payable Amount(Kshs)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($writers->count()>0)
                                            @foreach($writers as $writer)
                                                <tr>
                                                    <td>{{$writer->name}}</td>
                                                    <td>{{$writer->balanceFloat}}</td>
                                                    <td >{{$writer->balanceFloat*0.8}}</td>
                                                    <td>
                                                        @if($writer->payment->last()==null)

                                                            <span class="text-danger">Unpaid</span>
                                                        @else
                                                            @if($writer->payment->last()->created_at->isLastMonth())
                                                                <span class="text-danger">Unpaid</span>
                                                            @else
                                                                <span class="text-success">Paid</span>
                                                        @endif
                                                    @endif

                                                    </td>

                                                    <td>
                                                        <a href="{{route('statement.show',$writer->id)}}">
                                                            See History
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Balance($)</th>
                                            <th>Payable Amount($)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
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
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table_id6').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

        });
    </script>
@endsection
