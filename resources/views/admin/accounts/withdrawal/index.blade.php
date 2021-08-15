@extends('layouts.admin_layout')
@section('title','Withdrawal')
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
            <h5 class="fw-bold fs-5">Withdrawal Requests</h5>
            <hr>
            <div class="card">
                <div class="card-header">
                    <h5 class="fs-6">Pending Withdrawal Request</h5>
                </div>
                <div class="card-body">
                    <table id="withdraw" class="display">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Writer</th>
                            <th>Amount($)</th>
                            <th>Account Balance($)</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($withdrawals->count()>0)
                            @foreach($withdrawals as $withdrawal)

                                <tr>

                                    <td>{{$withdrawal->created_at->isoFormat('MMM Do Y')}}</td>
                                    <td>{{$withdrawal->user->name}}</td>
                                    <td>{{$withdrawal->amount}}</td>
                                    <td>{{$withdrawal->user->balanceFloat}}</td>
                                    <td>
                                        <a href="{{route('withdrawal.show',$withdrawal->id)}}">
                                            See Details
                                        </a>
                                    </td>


                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <th>Date</th>
                        <th>Writer</th>
                        <th>Amount($)</th>
                        <th>Account Balance($)</th>
                        <th>Action</th>
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
            $('#withdraw').DataTable();
        } );
        </script>
    @endsection
