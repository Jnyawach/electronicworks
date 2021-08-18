@extends('layouts.manager_layout')
@section('title',$writer->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <h5>{{$writer->name}} {{$writer->last_name}}</h5>
                <hr class="dropdown-divider">
                <div class="row green-body p-4">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <h3>{{$writer->cellphone}}</h3>
                            </div>
                            <div class="card-footer">
                                <h4 class="fs-5 fw-bold">ACCOUNT CONTACT</h4>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h3>
                                    ${{$writer->balanceFloat}}
                                </h3>
                            </div>
                            <div class="card-footer">
                                <h4 class="fs-5 fw-bold">ACCOUNT BALANCE</h4>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h3>
                                    ${{$writer->payment->sum('amount')}}
                                </h3>
                            </div>
                            <div class="card-footer">
                                <h4 class="fs-5 fw-bold">TOTAL EARNINGS</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <section>
                    <div class="card shadow-sm">
                        <div class="card-header p-3">
                            <h5 class="fw-bold fs-5">Payment History</h5>
                        </div>
                        <div class="card-body">
                            <table id="table_id6" class="display">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Transaction Code</th>
                                    <th>Amount($)</th>
                                    <th>Authorized by</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if($writer->payment)
                                    @foreach($writer->payment as $payment)
                                        <tr>
                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->created_at->isoFormat('MMM Do Y')}}</td>
                                            <td >
                                                {{$payment->trans_code}}
                                            </td>
                                            <td>
                                                {{$payment->amount}}
                                            </td>
                                            <td>
                                                {{\App\Models\User::FindOrFail($payment->authorized_by_id)->name}}
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Transaction Code</th>
                                    <th>Amount($)</th>
                                    <th>Authorized by</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready( function () {
            $('#table_id6').DataTable();
        } );
    </script>
@endsection


