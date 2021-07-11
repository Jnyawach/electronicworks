@extends('layouts.admin_layout')
@section('title', 'Admin User')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container pt-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <img src="{{url($user->getFirstMedia('avatar')? $user->getFirstMedia('avatar')
                    ->getUrl('avatar_card'):'/images/no-image.png' )}}" style="width:
                    180px">
                    <div class="position-relative">
                        <form class="position-absolute profile" enctype="multipart/form-data" method="POST"
                              action="{{route('profile')}}" id="myform">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="user_id">
                            <input type="file" id="avatar" hidden name="avatar" onchange="form.submit()"/>
                            <label for="avatar" class="upload-label" ><i class="fas fa-camera me-1"></i>Edit
                                profile picture</label>

                        </form>
                    </div>
                    <div class="mt-5 writer-progress">
                        <h5>Status: <span>Offline</span></h5>

                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 pt-5">
                    <div class="row">
                        <h5 class="fw-bold col">{{$user->name}} &nbsp; {{$user->last_name}}</h5>
                        <!--action button-->
                        <div class="dropdown col float-end">
                            <button class="btn btn-primary" type="button"
                                    id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v me-2"></i>ACTIONS
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="message1">
                                <li><a class="dropdown-item" href="{{route('user.edit', $user->id)}}">Edit <i
                                            class="fas fa-bookmark ms-2"></i></a></li>
                                <li>
                                    @if($user->status->name=='Disabled')
                                        <form method="POST" action="{{route('disable',
                                                            $user->id)}}">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status_id"
                                                   value="1">
                                            <button type="submit" class="btn">Enable <i
                                                    class="fas fa-check-square ms-2"></i></button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{route('disable',
                                                            $user->id)}}">
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
                                    <form method="POST" action="{{route('user.destroy',
                                      $user->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="user_id"
                                               value="{{$user->id}}">
                                        <button type="submit" class="btn text-danger">Delete <i
                                                class="far fa-trash-alt ms-2"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!--action button-->
                    </div>
                    <h4 class="fs-5">{{$user->role->name}}</h4>
                    <h4>Created: <span>{{$user->created_at->diffForHumans()}}</span> </h4>
                    <h4>Status: <span>{{$user->status->name}} <i class="fas fa-certificate ms-1"></i></span></h4>
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
                                    <form method="POST" action="{{route('pass', $user->id)}}">
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
                        <h5>Email: <span>{{$user->email}}</span></h5>
                        <h5>Cellphone: <span>08766289221</span></h5>
                        <h5>Secondary Cellphone: <span>N/A</span></h5>

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
