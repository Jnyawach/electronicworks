@extends('layouts.writer')
@section('title', 'Dashboard')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        table.dataTable td {
            font-size: 0.8em;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        @include('includes.writer_withdraw')
        <section class="mb-5">
            <nav class="nav indoor">
                <a class="nav-link active" aria-current="page"
                   href="{{route('finances.index')}}">All</a>
                <a class="nav-link" href="{{route('writer-unpaid')}}">Unpaid
                    <span class="badge bg-primary">{{$unpaid}}</span>
                </a>
                <a class="nav-link active" href="{{route('writer-paid')}}">Paid</a>
                <a class="nav-link" href="{{route('writer-refund')}}">Refunds</a>
            </nav>
            <hr class="dropdown-divider">
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
                                        {{$project->sku}}
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($project->writer_delivery)->isoFormat('MMM Do Y')}}</td>
                                    <td>{{$project->writer_pay}}</td>
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
        </section>
    </div>
    @include('includes.writer_transaction')
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#task').DataTable();
        } );
        $(document).ready( function () {
            $('#transaction').DataTable();
            $('#withdrawal').DataTable();
        } );

    </script>
@endsection

