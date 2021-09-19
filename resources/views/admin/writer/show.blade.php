@extends('layouts.admin_layout')
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
                    180px">

                    <div class="position-relative">
                        <form class="position-absolute profile" enctype="multipart/form-data" method="POST"
                              action="{{route('profile')}}" id="myform">
                            @csrf
                            <input type="hidden" value="{{$writer->id}}" name="user_id">
                            <input type="file" id="avatar" hidden name="avatar" onchange="form.submit()"/>
                            <label for="avatar" class="upload-label" ><i class="fas fa-camera me-1"></i>Edit
                                profile picture</label>

                        </form>
                    </div>
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
                        <!--action button-->
                        <div class="dropdown col float-end">
                            <button class="btn btn-primary" type="button"
                                    id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v me-2"></i>ACTIONS
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="message1">
                                <li><a class="dropdown-item" href="{{route('writer.edit',  $writer->id)}}">Edit <i
                                            class="fas fa-bookmark ms-2"></i></a></li>
                                <li>
                                    @if( $writer->status->name=='Disabled')
                                        <form method="POST" action="{{route('disable',
                                                             $writer->id)}}">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status_id"
                                                   value="1">
                                            <button type="submit" class="btn">Enable <i
                                                    class="fas fa-check-square ms-2"></i></button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{route('disable',
                                                             $writer->id)}}">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status_id"
                                                   value="4">
                                            <button type="submit" class="btn">Disable <i
                                                    class="fas fa-check-square ms-2"></i></button>
                                        </form>
                                    @endif
                                </li>
                                <li>
                                    <form method="POST" action="{{route('writer.destroy',
                                       $writer->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="user_id"
                                               value="{{ $writer->id}}">
                                        <button type="submit" class="btn text-danger">Delete <i
                                                class="far fa-trash-alt ms-2"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!--action button-->
                    </div>
                    <h4 class="fs-5">{{ $writer->getRoleNames()->first()}}</h4>
                    <h4 class="fs-5 ">Rating:
                        @if($writer->reviewing->count()>0)
                        <span>@for($i = 0; $i < 5; $i++)
                            <i class="fa{{ $writer->reviewing->sum('stars')/$writer->reviewing->count()  <= $i ? 'r' : '' }} fa-star"></i>
                        @endfor</span>
                        {{$writer->reviewing->sum('stars')/$writer->reviewing->count()}}/5 &nbsp;| &nbsp;{{$writer->reviewing->count()}} Ratings
                            @else
                            <span>No Rating</span>
                    @endif
                    </h4>
                    <h4>Created: <span>{{ $writer->created_at->diffForHumans()}}</span> </h4>
                    <h4>Status: <span>{{ $writer->status->name}}<i class="fas fa-certificate ms-1"></i></span></h4>
                    <h4>Gender: <span>{{ $writer->detail->gender}}</span></h4>
                    <h4>Available for Night call: <span>{{$writer->detail->night_calls}}</span></h4>
                    <!---Update password modal--->
                    <!-- Button trigger modal -->

                    <button type="button" class="" data-toggle="modal"
                            data-target="#exampleModal">
                       Change Password
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close btn-outline-primary hire" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('pass', $writer->id)}}">
                                        @csrf
                                        @method('PATCH')

                                            <div class="form-group required mt-3">
                                                <label for="password" class="control-label">Password:</label>
                                                <input type="password" class="form-control complete " placeholder="Password"
                                                       aria-label="password" name="password" id="password">

                                                <small class="text-danger">
                                                    @error('password')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>

                                            <div class="form-group required mt-3">
                                                <label for="password_confirmation" class="control-label">Password Confirm:</label>
                                                <input type="password" class="form-control complete"
                                                       placeholder="Confirm password"
                                                       aria-label="confirm_password" name="password_confirmation"
                                                       id="password_confirmation">
                                                <small class="text-danger">
                                                    @error('password_confirmation')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>


                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!---Update password modal--->

                    <div class="writer-progress pt-5">
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
                        <div class="d-inline-flex">
                            <a href="{{$writer->detail->getFirstMedia('cert')->getUrl()}}" class="btn btn-primary
                            hire m-2"
                               target="_blank">View Certificate</a>
                            <a href="{{$writer->detail->getFirstMedia('identity')->getUrl()}}" class="btn btn-primary
                            hire m-2" target="_blank">View Identity Card</a>
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


