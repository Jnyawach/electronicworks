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
                            <th>Invoice</th>
                            <th>Amount(KES)</th>
                            <th>Sale($)</th>
                            <th>Writer</th>
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
                                    <td>{{$project->invoice->number}}</td>
                                    <td>{{$project->writer_pay}}</td>
                                    <td>{{$project->client_pay}}</td>
                                    <td>{{$project->writers->name}}</td>
                                    <td>{{$project->clients->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn-sm dropdown-toggle p-0 m-0 text-decoration-none" href="#" role="button"
                                               id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                <li>
                                                    <a href="{{route('task.show', $project->slug)}}"
                                                       class="dropdown-item">View</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>



                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <th>Id</th>
                        <th>SKU</th>
                        <th>Invoice</th>
                        <th>Amount(KES)</th>
                        <th>Sale($)</th>
                        <th>Writer</th>
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

