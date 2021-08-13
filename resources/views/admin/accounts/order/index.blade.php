@extends('layouts.admin_layout')
@section('title', 'Projects')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
    table.dataTable td {
        font-size: 0.8em;
    }
</style>
@endsection
@section('content')

    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">
            @include('includes.balance')
            <nav class="nav indoor">
                <a class="nav-link active" aria-current="page"
                   href="{{route('order.index')}}">All</a>
                <a class="nav-link" href="{{route('unpaid')}}">Unpaid</a>
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
                            <th>Sale($)</th>
                            <th>Status</th>
                            <th>Client</th>
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
                                    <td>{{$project->writer_pay}}</td>
                                    <td>{{$project->client_pay}}</td>
                                    <td>{{$project->progress->name}}</td>
                                    <td>{{$project->clients->name}}</td>
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
                        <th>Sale($)</th>
                        <th>Status</th>
                        <th>Client</th>
                        <th>Payment </th>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#task').DataTable();
        } );

    </script>
@endsection

