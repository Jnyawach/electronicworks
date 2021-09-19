@extends('layouts.manager_layout')
@section('title','Edit User')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">


            <h5>Add Admin User</h5>
            <hr class="dropdown-divider">
            <h4 class="fs-5 fw-bold">Email:<span>{{$user->email}}</span></h4>

            <div class="row">
                <div class="col-8">
                    <form class="mt-5" method="POST" action="{{route('manager.update', $user->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input type="hidden" name="role_id" value="1">
                        </div>
                        <div class="form-group row required mb-5">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control incomplete" placeholder="First Name"
                                           aria-label="name" name="name" required value="{{ $user->name }}
                                        ">
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
                                           aria-label="last_name" name="last_name" required
                                           value="{{$user['last_name']}}">

                                </div>
                                <small class="text-danger">
                                    @error('last_name')
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
                                           aria-label="cellphone" name="cellphone" value="{{$user->cellphone}}">

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
                                           aria-label="Secondary cellphone" name="sec_cellphone" value="{{$user->sec_cellphone}}">

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

