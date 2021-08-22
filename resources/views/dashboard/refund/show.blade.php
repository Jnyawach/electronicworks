@extends('layouts.client_layout')
@section('title', $project->sku)
@section('content')
    @include('includes.ckeditor')
    <div>
        <div class="container  dashboard">
            @include('includes.status')
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h5><span class="fw-bold">{{$project->sku}}</span> {{$project->title}}
                            <span class="float-end">Completed</span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-inline-flex project-header">
                            <h5><span>Category:</span> {{$project->descipline->name}}</h5>
                            <h5 class="ms-3"><span>Deadline:</span>{{\Carbon\Carbon::parse
                                ($project->client_delivery)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</h5>
                            <h5 class="ms-3">
                                <span>Posted On:</span>{{$project->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}
                            </h5>

                            <h5 class="ms-3">
                                <span>Payout:</span>${{$project->client_pay}}
                            </h5>
                        </div>
                        @include('includes.status')
                        <div class="row mt-3 p-3">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h4>Use <span>{{$project->citation->name}}</span> citation style</h4>
                                <p>{!! $project->instruction !!}</p>

                                <h5 class="mt-4">Attached Files</h5>
                                @if($project->getMedia('materials'))
                                    @foreach($project->getMedia('materials') as $media)
                                        <a href="{{$media->getUrl()}}" target="_blank"><span><i class="fas fa-folder me-2"></i></span>{{$media->name}}</a>
                                    @endforeach
                                @else
                                    <p>No files attached</p>
                                @endif

                                <hr class="dotted">
                                @if($project->refunds->last()->status==0)
                                    <h4 class="mt-3 fw-bold">Refund: <span class="text-success">Pending Review</span></h4>
                                @elseif($project->refunds->last()->status==1)
                                    <h4 class="mt-3 fw-bold">Refund: <span class="text-success">Approved</span></h4>
                                @elseif($project->refunds->last()->status==2)
                                    <h4 class="mt-3 fw-bold">Refund: <span class="text-success">Rejected</span></h4>
                                @endif

                                @if($project->refunds->last()->status==2)
                                    <h4 class="mt-3 fw-bold">Reason</h4>
                                   <p>{!! $project->refunds->last()->reject_reason !!}</p>
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



