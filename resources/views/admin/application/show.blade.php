@extends('layouts.admin_layout')
@section('title', $client->name)
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container pt-5">
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

                                        <form method="POST" action="{{route('disable',
                                                            $client->id)}}">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status_id"
                                                   value="1">
                                            <button type="submit" class="btn">Accept <i
                                                    class="fas fa-check-square ms-2"></i></button>
                                        </form>
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

            <div class="">
                <hr>
                <h4>Essay</h4>
               <p> {!! $client->essay->essay_body !!}</p>


            </div>
        </div>



    </div>


@endsection






