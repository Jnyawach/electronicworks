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
                <a class="nav-link " aria-current="page"
                   href="{{route('order.index')}}">All</a>
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
                            <th>Sale($)</th>
                            <th>Status</th>
                            <th>Client</th>
                            <th>Action </th>
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

                                        <h4 data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            style="cursor:pointer" class="text-success">
                                       Action<i class="fas fa-pen-square ms-1"></i>
                                                </h4>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="paid" action="{{route('mark',$project->id)}}"
                                                              method="POST">
                                                            @method('PATCH')
                                                            @csrf
                                                            <label for="action">Mark as:</label>
                                                            <select class="form-select" id="action" name="action" required>
                                                                <option selected value="">Select Action</option>
                                                                <option value="0">Unpaid</option>
                                                                <option value="1">Paid</option>

                                                            </select>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn-sm btn-primary"
                                                                form="paid">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                        <th>Action </th>
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


