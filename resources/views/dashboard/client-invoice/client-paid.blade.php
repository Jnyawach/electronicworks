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
    @include('includes.client_balances')
    <div class="container p-5">
        <nav class="nav indoor">
            <a class="nav-link" aria-current="page"
               href="{{route('client-invoice.index')}}">All</a>
            <a class="nav-link" href="{{route('client-unpaid')}}">Unpaid</a>
            <a class="nav-link active" href="{{route('client-paid')}}">Paid</a>
            <a class="nav-link" href="{{route('client-refund')}}">Refunds</a>
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
                        <th>Refund</th>
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
                                @if(\Carbon\Carbon::now()<=$project->created_at->addMonths(3))
                                <td> <!-- Button trigger modal -->
                                    <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$project->id}}">
                                        Claim Refund
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Claim Refund</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="refund" action="{{route('refund.store')}}" method="POST" style="width: 600px"
                                                    enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="project" value="{{$project->id}}">
                                                        <div class=" form-group required">
                                                            <label class="control-label" for="reason">
                                                                Reason For Refund:
                                                            </label>
                                                            <textarea class="form-control complete mt-3" required name="reason" style="height: 100px">
                                                            </textarea>
                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <label for="formFile" class="form-label">Attach files(optional)</label>
                                                            <input class="form-control" type="file" id="formFile" name="evidence">
                                                            <small class="text-success">Please compress if the files are multiple</small>
                                                        </div>


                                                    </form>
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="submit" class="btn btn-primary" form="refund">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                    @else
                                    <td>Refund Unavailable</td>
                                    @endif





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
                    <th>Refund</th>
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


