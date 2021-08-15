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
                    <th>Type</th>

                </tr>
                </thead>
                <tbody>

                <tr>

                    <td>20-08-2021</td>
                    <td>
                        PKAHRT67
                    </td>
                    <td>80.00</td>
                    <td class="text-success">Withdrawal</td>

                </tr>

                </tbody>
                <tfoot>

                <th>Date</th>
                <th>Transaction Code</th>
                <th>Amount($)</th>
                <th>Type</th>
                </tfoot>

            </table>
        </div>
    </div>
    <h5 class="fw-bold mt-5">Withdrawal Request</h5>
    <hr class="dropdown-divider">

    <div class="card">
        <div class="card-body">
            <table id="withdrawal" class="display">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount($)</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach(Auth::user()->withdrawal as $withdraw)

                <tr>

                    <td>{{$withdraw->created_at->isoFormat('MMM Do Y')}}</td>
                    <td>
                       $. {{$withdraw->amount}}
                    </td>
                    <td>@if($withdraw->status==0)
                            <span class="text-warning">Pending</span>
                            @elseif($withdraw->status==1)
                            <span>Processed</span>
                            @else
                            <span class="text-danger">Rejected</span>
                    @endif
                    </td>
                    <td class="text-success">
                        <a href="{{route('finances.show',$withdraw->id)}}">
                            See details
                        </a>
                    </td>

                </tr>
                    @endforeach

                </tbody>
                <tfoot>

                <th>Date</th>
                <th>Amount($)</th>
                <th>Status</th>
                <th>Action</th>
                </tfoot>

            </table>
        </div>
    </div>
</section>
