<section class="mb-5">
    <h5 class="fw-bold">Transaction History</h5>
    <hr class="dropdown-divider">
    <div class="card">
        <div class="card-body">
            <table id="transaction" class="display">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Transaction Code</th>
                    <th>Amount($)</th>


                </tr>
                </thead>
                <tbody>
                @if(Auth::user()->payment)
                    @foreach(Auth::user()->payment as $payment)
                        <tr>
                            <td>{{$payment->created_at->isoFormat('MMM Do Y')}}</td>
                            <td >
                                {{$payment->trans_code}}
                            </td>
                            <td>
                                {{$payment->amount}}
                            </td>


                        </tr>
                    @endforeach
                @endif
                <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Transaction Code</th>
                    <th>Amount($)</th>

                </tr>
                </tfoot>


            </table>
        </div>
    </div>

</section>
