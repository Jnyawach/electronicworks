<section>
    <h5 class="fw-bold">Financial Dashboard
        <button type="button" class="btn-sm btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
            Withdraw
        </button>
    </h5>

    <hr class="dropdown-divider mt-4">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@include('includes.writer_finance')
<!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
         data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <h5>Submit withdrawal request</h5>
                    <ol>
                        <li>You can only withdraw upto 80% of your account balance</li>
                        <li>Withdrawal may take upto 48hrs to process</li>
                        <li>Payment is made via Mpesa through the phone you provided when creating your
                            account. If you wish to change the number, do so by updating you profile
                        </li>
                    </ol>
                    <form action="{{route('finances.store')}}" method="POST" id="finance">
                        @csrf
                        <input type="hidden" name="user" value="{{Auth::id()}}">
                        <div class="form-group required">
                            <label for="amount" class="control-label">Enter Amount($):</label>
                            <input type="text" aria-label="amount" class="form-control complete"
                                   id="amount" name="amount" value="{{Auth::user()->balanceFloat*0.8}}"
                                   style="width: 500px" required>
                            <small class="text-danger">
                                @error('amount')
                                {{ $message }}
                                @enderror
                            </small>
                            <small>80% of your account balance is $ {{Auth::user()->balanceFloat*0.8}}</small>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="finance">Submit</button>
                </div>
            </div>
        </div>
    </div>

</section>
