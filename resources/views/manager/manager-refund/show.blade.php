@extends('layouts.manager_layout')
@section('title','Refund')
@section('content')
    @include('includes.ckeditor')
    <div class="dashboard-wrapper green-body pt-5 pb-5">
        <div class="container pt-3 pl-3 dashboard">
            @include('includes.status')
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h5>{{$refund->project->title}}
                            <span class="float-end text-danger">Refund Request</span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-inline-flex project-header">
                            <h5><span>Category:</span> {{$refund->project->descipline->name}}</h5>
                            <h5 class="ms-3"><span>Submitted On:</span>{{\Carbon\Carbon::parse
                                ($refund->project->submission->created_at)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                            <h5 class="ms-3">
                                <span>Posted On:</span>{{$refund->project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}
                            </h5>

                            <h5 class="ms-3">
                                <span>Payout:</span>${{$refund->project->client_pay}}
                            </h5>

                        </div>
                        <div class="row mt-3 p-3">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h4>Use <span>{{$refund->project->citation->name}}</span> citation style</h4>
                                <p>{!! $refund->project->instruction !!}</p>

                                <h5 class="mt-4">Attached Files</h5>
                                @if($refund->project->getMedia('materials'))
                                    @foreach($refund->project->getMedia('materials') as $media)
                                        <a href="{{$media->getUrl()}}" target="_blank"><span><i class="fas fa-folder me-2"></i></span>{{$media->name}}</a>
                                    @endforeach
                                @else
                                    <p>No files attached</p>
                                @endif
                                <hr class="dotted">
                                <div class="green-body p-3">
                                <h5>Submitted</h5>
                                <h4>Writer:<span>{{$refund->project->writers->name}}
                                        {{$refund->project->writers->last_name}}</span></h4>
                                <h4>Client:<span>{{$refund->project->clients->name}}
                                        {{$refund->project->clients->last_name}}</span></h4>
                                <h4>Attached Comments</h4>
                                <p>{!! $refund->project->submission->comment? $refund->project->submission->comment:'No comments attached'
                        !!}</p>
                                <h4>Attached Files</h4>
                                <a href="{{$refund->project->submission->getFirstMedia('attachment')->getUrl()}}"
                                   target="_blank"><span><i
                                            class="fas fa-folder
                        me-2"></i></span>{{$refund->project->submission->getFirstMedia('attachment')->name}}</a>
                                </div>
                                @if($refund->status==0)
                                <div class="refund">
                                    <hr class="dotted">
                                    <h5>Refund Request</h5>
                                    <h4 class="fw-bold">Reason (Submitted by client)</h4>
                                    <p>{{$refund->reason}}</p>
                                    <h4 class="fw-bold">Attached Evidence</h4>
                                    <a href="{{$refund->getFirstMedia('evidence')?$refund->getFirstMedia('evidence')->getUrl():'#'}}"
                                       target="_blank"><span><i class="fas fa-folder me-2"></i></span>
                                        {{$refund->getFirstMedia('evidence')?$refund->getFirstMedia('evidence')->name:'Not available'}}</a>

                                </div>
                                <div class="green-body p-3">
                                    <h5>Accept request</h5>
                                    <form action="{{route('refundApprove',$refund->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Approve Request</button>
                                    </form>
                                    <hr class="dotted">
                                    <h5 class="text-danger">Decline request</h5>
                                    <form action="{{route('refundDecline',$refund->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group required">
                                            <label class="control-label" for="reason">
                                                Reason for Decline:
                                            </label>
                                            <textarea required name="reason" class="form-control" id="reason">
                                            </textarea>

                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </form>
                                </div>
                                    @elseif($refund->status==1)
                                    <h5 class="fw-bold fs-5 mt-3">Refund Status:<span class="text-success fs-5">Accepted</span></h5>
                                @elseif($refund->status==2)
                                    <h5 class="fw-bold fs-5 mt-3">Refund Status:<span class="text-danger fs-5">Rejected</span></h5>
                                    <p>{!! $refund->reject_reason !!}</p>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'reason', );
    </script>
@endsection





