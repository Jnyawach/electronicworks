@extends('layouts.admin_layout')
@section('title', 'Add Client')
@section('content')

    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">


            <h5>Add Client</h5>
            <hr class="dropdown-divider">
            <small class="text-danger">This user has super client rights</small>
            <div class="row">
                <div class="col-8">
                    <form class="mt-5" method="POST" action="{{route('client.store')}}">
                        @csrf
                        <div class="form-group row required mb-5">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control incomplete" placeholder="First Name"
                                           aria-label="name" name="name" required value="{{ old('name') }}">
                                </div>
                                <small class="text-danger">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control incomplete" placeholder="Last Name"
                                           aria-label="last_name" name="last_name" required value="{{ old('last_name')
                                           }}">

                                </div>
                                <small class="text-danger">
                                    @error('last_name')
                                    {{ $message }}
                                    @enderror
                                </small>

                            </div>

                        </div>
                        <div class="form-group mt-3 mb-5">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" ><i class="far fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control incomplete" placeholder="Email Address"
                                       aria-label="email" name="email" required value="{{ old('email') }}">

                            </div>
                            <small class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group row required mb-5">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                    </div>
                                    <select class="form-select incomplete" name="status_id" required>
                                        <option selected>Select Status</option>
                                        @foreach($status as $id=>$stat)
                                            <option value="{{$id}}">{{$stat}}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <small>Select the user status (Active or Inactive)</small>
                                <small class="text-danger">
                                    @error('status')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fas fa-user"></i></span>
                                    </div>
                                    <select class="form-select incomplete" name="role_id" required>
                                        <option selected>Select Role</option>
                                        @foreach($role as $id=>$rol)
                                            <option value="{{$id}}">{{$rol}}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <small>Select the user role (Client)</small>
                                <small class="text-danger">
                                    @error('role_id')
                                    {{ $message }}
                                    @enderror
                                </small>

                            </div>

                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control incomplete " placeholder="Password" aria-label="password" name="password">

                                </div>
                                <small class="text-danger">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control incomplete"
                                           placeholder="Confirm password"
                                           aria-label="confirm_password" name="password_confirmation">

                                </div>
                                <small class="text-danger">
                                    @error('password_confirmation')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>


                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control incomplete " placeholder="Cellphone"
                                           aria-label="cellphone" name="cellphone">

                                </div>
                                <small class="text-danger">
                                    @error('cellphone')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control incomplete"
                                           placeholder="Secondary cellphone"
                                           aria-label="sec_cellphone" name="sec_cellphone">

                                </div>
                                <small class="text-danger">
                                    @error('sec_cellphone')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>


                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-3">SUBMIT  &nbsp;<i class="fas
                                fa-long-arrow-alt-right ms-3"></i></button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
