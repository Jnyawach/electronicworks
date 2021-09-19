@extends('layouts.manager_layout')
@section('title',  $writer->name)
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container pt-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5 mx-auto">
                    <img src="{{url($writer->getFirstMedia('avatar')? $writer->getFirstMedia('avatar')
                    ->getUrl('avatar_card'):'/images/no-image.png' )}}" style="width:
                    180px" class="img-thumbnail">

                    <div class="mt-5 writer-progress">
                        <h5>Status: @if($writer->isOnline()) <span>online</span>
                            @else
                                <span>Last seen {{\Carbon\Carbon::parse($writer->last_seen)->diffForHumans()}}</span>
                            @endif
                        </h5>
                        <h5>Projects completed: <span>{{$writer->jobs->count()}}</span></h5>
                        <h5>Projects cancelled: <span>{{$writer->jobs->where('progress_id',9)->count()}}</span></h5>
                        <h5>Projects in progress: <span>{{$writer->jobs->where('progress_id',2)->count()}}</span></h5>

                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 pt-5 my-auto">
                    <div class="row">
                        <h5 class="fw-bold col">{{ $writer->name}} &nbsp; {{ $writer->last_name}}</h5>

                    </div>

                    <h4 class="fs-5 ">Rating:<span><i class="fas fa-star">
                           </i><i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                           4.5/5 &nbsp;| &nbsp;800 Rating</span></h4>
                    <h4>Created: <span>{{ $writer->created_at->diffForHumans()}}</span> </h4>
                    <h4>Status: <span>{{ $writer->status->name}}<i class="fas fa-certificate ms-1"></i></span></h4>
                    <h4>Gender: <span>{{ $writer->detail->gender}}</span></h4>
                    <h4>Available for Night call: <span>{{$writer->detail->night_calls}}</span></h4>

                    <div class="writer-progress pt-3">
                        <h5 class="mt-5">About</h5>
                        <hr>
                        <h5>Email: <span>{{ $writer->email}}</span></h5>
                        <h5>Primary/Mpesa Cellphone: <span>{{ $writer->cellphone}}</span></h5>
                        <h5>Secondary Cellphone: <span>{{ $writer->sec_cellphone}}</span></h5>
                        <h5>University: <span>{{$writer->detail->university}}</span></h5>
                        <h5>Department: <span>{{$writer->detail->department}}</span></h5>
                        <h5>Course: <span>{{$writer->detail->course}}</span></h5>
                        <h5>Test Score: <span>{{$writer->detail->score}}</span></h5>
                        <h5>Address: <span>{{$writer->detail->country}},{{$writer->detail->city}},
                                {{$writer->detail->zip}}</span></h5>
                        <div>

                            <a href="{{$writer->detail->getFirstMedia('cert')?$writer->detail->getFirstMedia('cert')
                            ->getUrl():'#'}}" class="m-2"
                               target="_blank">Certificate:{{$writer->detail->getFirstMedia('identity')->name}}</a><br>
                            <a href="{{$writer->detail->getFirstMedia('identity')?$writer->detail->getFirstMedia('identity')
                            ->getUrl():'#'}}" class="m-2"
                               target="_blank">Identity Card:{{$writer->detail->getFirstMedia('identity')->name}}</a>

                        </div>



                    </div>

                </div>
            </div>
        </div>



    </div>


@endsection
@section('scripts')
    <script>
        document.getElementById("file").onchange = function() {
            document.getElementById("form").submit();
        };
    </script>
@endsection



