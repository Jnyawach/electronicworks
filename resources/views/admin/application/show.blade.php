@extends('layouts.admin_layout')
@section('title', $client->name)
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <img src="{{url($client->getFirstMedia('avatar')? $client->getFirstMedia('avatar')
                    ->getUrl('avatar_card'):'/images/no-image.png' )}}" style="width:
                    180px">

                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 pt-5">
                    <div class="row">
                        <h5 class="fw-bold col">{{$client->name}} &nbsp; {{$client->last_name}}</h5>
                        <!--action button-->
                        <div class="dropdown col float-end">
                            <button class="btn btn-primary" type="button"
                                    id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v me-2"></i>ACTIONS
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="message1">
                                <li>
                                    @if($client->role->name=='Client')

                                        <form method="POST" action="{{route('disable',
                                                            $client->id)}}">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status_id"
                                                   value="1">
                                            <button type="submit" class="btn">Accept <i
                                                    class="fas fa-check-square ms-2"></i></button>
                                        </form>
                                        @endif
                                </li>
                                <li>
                                    <form method="POST" action="{{route('client.destroy',
                                      $client->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="user_id"
                                               value="{{$client->id}}">
                                        <button type="submit" class="btn text-danger">Delete <i
                                                class="far fa-trash-alt ms-2"></i></button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                        <!--action button-->
                    </div>
                    <h4 class="fs-5">{{$client->role->name}}</h4>
                    <h4>Created: <span>{{$client->created_at->diffForHumans()}}</span> </h4>
                    <h4>Status: <span>{{$client->status->name}} <i class="fas fa-certificate ms-1"></i></span></h4>

                    <div class="writer-progress pt-5">
                        <h5 class="mt-5">About</h5>
                        <hr>
                        <h5>Email: <span>{{$client->email}}</span></h5>
                        <h5>Cellphone: <span>{{$client->cellphone?$client->cellphone:'N/A'}}</span></h5>
                        <h5>Secondary Cellphone: <span>{{$client->sec_cellphone?$client->sec_cellphone:'N/A'}}</span></h5>
                        @if($client->role->name=='Writer')
                            <h5>University: <span>{{$client->detail?$client->detail->university:'N/A'}}</span></h5>
                            <h5>Department: <span>{{$client->detail?$client->detail->department:'N/A'}}</span></h5>
                            <h5>Course: <span>{{$client->detail?$client->detail->course:'N/A'}}</span></h5>
                            <h5>Address: <span>{{$client->detail?$client->detail->country:'N/A'}},
                                    {{$client->detail?$client->detail->city:'N/A'}},
                                {{$client->detail?$client->detail->zip:'N/A'}}</span></h5>
                            <div class="d-inline-flex">
                                @if($client->detail()->exists())
                                <a href="{{$client->detail->getFirstMedia('cert')?$client->detail->getFirstMedia
                                ('cert')->getUrl():'#'}}" class="btn btn-primary
                            hire m-2"
                                   target="_blank">View Certificate</a>
                                <a href="{{$client->detail->getFirstMedia('identity')?$client->detail->getFirstMedia
                                ('identity')->getUrl():'#'}}" class="btn
                                btn-primary
                            hire m-2" target="_blank">View Identity Card</a>
                                    @endif
                            </div>
                        @endif

                    </div>

                </div>
            </div>
            @if($client->role->name=='Writer')

            <div class="">
                <hr>
                <h5>Essay</h5>
               <p> {!! $client->essay->essay_body !!}</p>


            </div>
            <div class="mb-5">
                <hr>
                <h5>English Test</h5>
                @foreach(json_decode($client->test->test) as $grammar)
                  <p>{!! $quiz=\App\Models\Examination::findOrFail($grammar->id)->quiz !!}</p>
              <p><span>Writer:</span>&nbsp;{{$grammar->value}}</p>
                    <p><span>Answer:</span>&nbsp;{!! $quiz=\App\Models\Examination::findOrFail($grammar->id)->answer
                    !!}</p>
                    <hr class="dotted">

                    @endforeach
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Writer Approve/Disapprove
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('application.update',$client->id)}}" method="POST" id="approve">
                                    @method('PATCH')
                                    @csrf
                                    <small class="text-danger">Please use this form to approve or reject user
                                        application</small>

                                    <div class="form-group">
                                        <select class="form-select complete" name="status" required id="status">
                                            <option value="" selected>Select action</option>
                                            <option value="1">Approve Writer</option>
                                            <option value="4" >Reject Writer</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control complete" name="score"
                                               required placeholder="Test Score"
                                               value="{{old('score')}}">
                                        <small class="text-danger">
                                            @error('score')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" form="approve">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                @endif

        </div>



    </div>


@endsection






