@extends('layouts.admin_layout')
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
                                                @if($writer->balanceFloat>0)
                                                <tr>
                                                    <td>{{$writer->name}}</td>
                                                    <td>{{$writer->balanceFloat}}</td>
                                                    <td class="text-danger
                                                    fw-bold">{{$writer->balanceFloat-20.00 }}</td>

                                                    <td>
                                                        @if($writer->payment->last()==null)

                                                        <button type="button" class="btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop{{$writer->id}}">
                                                            Remit Pay
                                                        </button>
                                                            @else
                                                          @if($writer->payment->last()->created_at->isLastMonth())
                                                                <button type="button" class="btn-sm btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#staticBackdrop{{$writer->id}}">
                                                                    Remit Pay
                                                                </button>
                                                              @else
                                                              <span class="text-success">Paid</span>
                                                              @endif
                                                        @endif
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop{{$writer->id}}"
                                                             data-bs-backdrop="static"
                                                             data-bs-keyboard="false"
                                                             tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="staticBackdropLabel">Payment
                                                                            Remittance </h5>
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body p-4">
                                                                        <h5>Submit withdrawal request</h5>
                                                                        <ol>
                                                                            <li>
                                                                                The Writer must retain a minimum of $20 in his/her account
                                                                            </li>
                                                                            <li>Payment Should be processed on 15th of
                                                                                every month
                                                                            </li>
                                                                            <li>Payment is made via Mpesa through Writers Cellphone No.<span class="fw-bold"
                                                                                >{{$writer->cellphone}}</span>

                                                                            </li>
                                                                        </ol>
                                                                        <form action="{{route('accounts.store')}}"
                                                                              method="POST" id="finance{{$writer->id}}" >
                                                                            @csrf
                                                                            <input type="hidden" name="writer"
                                                                                   value="{{$writer->id}}">

                                                                            <div class="form-group required">
                                                                                <input type="hidden" aria-label="amount"
                                                                                       class="form-control complete"
                                                                                       id="amount" name="amount" value="{{$writer->balanceFloat-20.00}}"
                                                                                       required>

                                                                                <h5 class="fs-5 fw-bold">$20 less of the writer account balance is
                                                                                    $ {{$writer->balanceFloat-20.00}}</h5>
                                                                            </div>
                                                                            <div class="form-group required">
                                                                                <label for="code" class="control-label">
                                                                                    Transaction Code:
                                                                                </label>
                                                                                <input type="text" name="trans_code" id="code"  required
                                                                                class="form-control complete">
                                                                                <small class="text-danger">
                                                                                    @error('trans_code')
                                                                                    {{ $message }}
                                                                                    @enderror
                                                                                </small>
                                                                                <small>Please enter the Mpesa transaction code</small>
                                                                                <div class="form-group">
                                                                                    <label for="date" class="control-label">
                                                                                        Exact Transaction Date & Time:
                                                                                    </label>
                                                                                    <input type="datetime-local" name="date" id="date" required
                                                                                           class="form-control complete">
                                                                                    <small class="text-danger">
                                                                                        @error('date')
                                                                                        {{ $message }}
                                                                                        @enderror
                                                                                    </small>
                                                                                    <small>This is attached to the Mpesa transaction Message</small>
                                                                                </div>
                                                                            </div>


                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary"
                                                                                form="finance{{$writer->id}}">Submit
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="{{route('accounts.show',$writer->id)}}">
                                                            See History
                                                        </a>
                                                    </td>

                                                </tr>
                                                @endif
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
