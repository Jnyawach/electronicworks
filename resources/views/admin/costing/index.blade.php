@extends('layouts.admin_layout')
@section('title', 'project Costing')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">

            <div class="container ">
        <h5>Use this tab to edit the percentage for project costing model</h5>
                <hr>
                @include('includes.status')
        <h4 class="fw-bold fs-3">Current Percentile</h4>
                <small>This percentage represents what the writer has quoted</small>
                <h1 style="font-size: 60px">{{$cost->percentage}}%</h1>
                <hr class="dotted">
                <h5>Edit</h5>
                <form action="{{route('costing.update',$cost->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="percentage" class="control-label">Percentage:</label>
                        <input type="text" name="percentage" placeholder="Input Percentage"
                        class="form-control complete" style="width: 600px">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
