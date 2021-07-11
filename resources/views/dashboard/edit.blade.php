@extends('layouts.client_layout')
@section('title', 'Edit Profile')
@section('content')
    <div class="pt-5 ps-3">



            <h5>Edit Profile</h5>
            <hr class="dropdown-divider">

            <div class="row">
                <div class="col-8">
                    <form class="mt-5" method="POST" action="{{route('dashboard.update', $client->id)}}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row required mb-5">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control incomplete" placeholder="First Name"
                                           aria-label="name" name="name" required value="{{$client->name}}">
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
                                           aria-label="last_name" name="last_name" required value="{{$client->last_name
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
                                       aria-label="email" name="email" required value="{{$client->email }}">

                            </div>
                            <small class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>


                        <div class="form-group row mb-3">
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control incomplete " placeholder="Cellphone"
                                           aria-label="cellphone" name="cellphone" value="{{$client->cellphone}}">

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
                                           aria-label="sec_cellphone" name="sec_cellphone"
                                           value="{{$client->sec_cellphone}}">

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
                                <button type="submit" class="btn btn-primary mt-3">UPDATE  &nbsp;<i class="fas
                                fa-long-arrow-alt-right ms-3"></i></button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>


    </div>
@endsection


