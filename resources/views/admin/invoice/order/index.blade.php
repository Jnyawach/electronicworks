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
                            <th>Delivery</th>
                            <th>Amount($)</th>
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
                                    <td>{{\Carbon\Carbon::parse($project->client_delivery)->isoFormat('MMM Do Y')}}</td>
                                    <td>{{$project->writer_pay}}</td>
                                    <td>{{$project->client_pay}}</td>
                                    <td>{{$project->writers->name}}</td>
                                    <td>{{$project->clients->name}}</td>
                                    <td>

                                        <h4 data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{$project->sku}}" style="cursor:
                                            pointer">

                                           Unpaid <i class="fas fa-pen-square"></i></h4>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{$project->sku}}"
                                             data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Mark as
                                                            Paid</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form id="paid" action="" method="POST">
                                                           <div class="form-check">
                                                               <input class="form-check-input" type="checkbox"
                                                                      value="" id="flexCheckChecked" name="payment">
                                                               <label class="form-check-label" for="flexCheckChecked">
                                                                   Mark as Paid
                                                               </label>
                                                           </div>
                                                       </form>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" class="btn
                                                        btn-primary" for="paid">Save</button>
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

