@extends('layouts.client_layout')
@section('title', 'invoices')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">

    <style>
        table.dataTable td {
            font-size: 0.8em;
        }
    </style>
@section('content')
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="fs-4 fw-bold">$. {{$total}}</h4>
                        <h5 class="fs-5">TOTAL SPENT</h5>

                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="fs-4 fw-bold">$. {{$unpaid}}</h4>
                        <h5 class="fs-5">DUE AND UNPAID</h5>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="fs-4 fw-bold">$. 73400</h4>
                        <h5 class="fs-5">REFUNDS</h5>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container p-5">
        <nav class="nav indoor">
            <a class="nav-link" aria-current="page"
               href="{{route('client-invoice.index')}}">All</a>
            <a class="nav-link active" href="{{route('unpaid')}}">Unpaid</a>
            <a class="nav-link" href="{{route('paid')}}">Paid</a>
            <a class="nav-link" href="{{route('refund')}}">Refunds</a>
        </nav>
        <hr class="dropdown-divider">
        @include('includes.status')
        <div class="card">
            <div class="card-header">
                <h5>Orders</h5>
            </div>
            <div class="card-body">
                <table id="task" class="display">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>SKU</th>
                        <th>Delivery</th>
                        <th>Amount($)</th>
                        <th>Status</th>
                        <th>Payment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($projects->count()>0)
                        @foreach($projects as $project)

                            <tr>

                                <td>{{$project->id}}</td>
                                <td>
                                    <a href="{{route('order.show', $project->id)}}"
                                       class="text-decoration-none text-primary" style="font-size: 0.9em">
                                        {{$project->sku}}</a>
                                </td>
                                <td>{{\Carbon\Carbon::parse($project->client_delivery)->isoFormat('MMM Do Y')}}</td>
                                <td>{{$project->client_pay}}</td>
                                <td>{{$project->progress->name}}</td>
                                <td>
                                    @if($project->payment==1)
                                        <span class="text-success">Paid</span>
                                    @elseif($project->payment==0)
                                        <span class="text-danger">Unpaid</span>
                                    @elseif($project->payment==2)
                                        <span class="text-warning">Refund</span>
                                    @endif
                                </td>





                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <th>Id</th>
                    <th>SKU</th>
                    <th>Delivery</th>
                    <th>Amount($)</th>
                    <th>Status</th>
                    <th>Payment </th>
                    </tfoot>

                </table>
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
        $(document).ready( function () {
            $('#task').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

        } );
    </script>
@endsection


