@extends('layouts.main')
@section('title', 'Sign Up')
@section('body-class','green-body')
@section('content')
    <section class="sign-up">
        <div class="container mt-5 mb-5">
            <div class="row ">
                <div class="col-10 mx-auto mt-5">
                    <div class="card m-5 p-5" >
                        <div class="card-body">
                            <h5 class="card-title text-center">SIGN UP TO ELECTRONIC WORKS</h5>
                            <form class="mt-5" method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="role_id" value="2">
                                <input type="hidden" name="status_id" value="2">
                                <div class="form-group row mt-4">
                                    <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control incomplete" placeholder="First Name"
                                                   aria-label="name" name="name" required value="{{old('name')}}" autocomplete="name" autofocus>
                                        </div>
                                        <small class="text-danger">
                                            @error('name')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" ><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control incomplete" placeholder="Last Name"
                                                   aria-label="last_name" name="last_name" required value="{{old
                                                   ('last_name')}}" autocomplete="last_name">
                                        </div>
                                        <small class="text-danger">
                                            @error('last_name')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                </div>

                                <div class="form-group mt-3">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control incomplete" placeholder="Email Address"
                                               aria-label="email" name="email" required autocomplete="email">
                                    </div>
                                    <small class="text-danger">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="password" class="form-control incomplete" placeholder="Password"
                                                   aria-label="Password" name="password" required autocomplete="new-password">
                                        </div>
                                        <small class="text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" ><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="password" class="form-control incomplete"
                                                   placeholder="Confirm password"
                                                   aria-label="confirm password" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <small class="text-danger">
                                            @error('password_confirmation')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-6 mx-auto text-center">
                                        <button type="submit" class="btn btn-primary mt-3">SUBMIT</button>
                                        <hr>
                                        <h4 style="font-size: 18px">Already have an account?</h4>
                                        <a href="{{route('login')}}" title="Login" class="btn btn-outline-primary mt-3
                                        free">Login</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
