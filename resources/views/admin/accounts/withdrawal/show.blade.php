@extends('layouts.admin_layout')
@section('title', 'Withdrawal Request')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">
            <h5 class="fw-bold fs-5">
                ID NO.{{$withdraw->id}} {{$withdraw->user->name}} {{$withdraw->user->last_name}}</h5>
            <hr>
            <section class="m-5">
                <h4 class="fw-bold">Amount: <span>${{$withdraw->amount}}</span></h4>
                <h4 class="fw-bold">Account Balance: <span>${{$withdraw->user->balanceFloat}}</span></h4>
                <hr class="dotted mt-5">
                <h5>Approved withdrawal</h5>
                <form action="{{route('withdrawal.store')}}" method="POST" style="width: 500px">
                    @csrf
                    <input type="hidden" value="{{$withdraw->user->id}}" name="writer">
                    <input type="hidden" value="{{$withdraw->id}}" name="withdraw">
                    <input type="hidden" value="{{$withdraw->id}}" name="authority">
                    <h4>Requested Amount: <span>${{$withdraw->amount}}</span></h4>
                    <div class="form-group mt-4 required">
                        <label for="transaction" class="control-label">Transaction Code:</label>
                        <input type="text" class="form-control complete mt-3" name="trans_code"
                        id="transaction" required>
                        <small>This is the Mpesa code attached to the transaction message</small>

                    </div>
                    <div class="form-group required mt-3">
                        <label for="time" class="control-label">
                            Transaction Time:
                        </label>
                        <input type="datetime-local" name="time" required class="form-control complete mt-3">
                        <small>The exact time the transaction was carried out. You can find this on the Mpesa
                            Message</small>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                <hr class="dotted mt-4">
                <h5>Reject Withdrawal</h5>
                <form action="{{route('withdrawal.update',$withdraw->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group required" style="width: 600px">
                        <label for="reason" class="control-label">Reason:</label>
                        <textarea class="form-control complete" name="reason" id="reason"
                                  required style="height: 200px">

                        </textarea>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </section>
        </div>
    </div>
@endsection
