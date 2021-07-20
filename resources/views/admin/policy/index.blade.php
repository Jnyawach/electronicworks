@extends('layouts.admin_layout')
@section('title','Policy')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <h5>Terms and Conditions/ Privacy Policy</h5>
                <hr>
                <div class="row">
                    @if($policies->count()>0)
                        @foreach($policies as $policy)
                            <div class="col-12 col-m-6 col-lg-6">
                                <div class="card border-3 border-top border-top-primary">
                                    <a href="{{route('policy.show', $policy->id)}}" >
                                        <div class="card-body">
                                            <h5 class="text-muted">
                                                @if($policy->category=='Policy')
                                                    Privacy Policy
                                                @else
                                                    Terms and Condition
                                                @endif
                                            </h5>

                                            <div class="metric-value d-inline-block">
                                                <h5 class="mb-1">Last Updated: {{$policy->updated_at->isoFormat('MMMM
                                                 Do YYYY')}}</h5>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <h4>There are no terms and conditions in the database</h4>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
