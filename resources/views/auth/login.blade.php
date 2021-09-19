@extends('layouts.main')
@section('title', 'Login')
@section('body-class','green-body')
@section('content')
    <section class="sign-up">
        <div class="container mt-5 mb-5">
            <div class="row ">
                <div class="col-sm-12 col-md-10 col-lg-7 mx-auto mt-5">
                    <div class="card m-5 p-5" >
                        <div class="card-body">
                            <h5 class="card-title text-center">LOGIN TO ELECTRONIC WORKS</h5>
                            <form class="mt-5" method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="form-group mt-3">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control incomplete" placeholder="Email Address"
                                               aria-label="email" name="email" value="{{ old('email') }}" required
                                               autocomplete="email" autofocus>
                                    </div>
                                    <small class="text-danger">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group  mt-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="password" class="form-control incomplete" placeholder="Password"
                                               aria-label="Password" name="password" required autocomplete="current-password">
                                    </div>
                                    <small class="text-danger">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                    </small>


                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 mx-auto text-center">
                                        <button type="submit" class="btn btn-primary mt-3">SUBMIT</button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        <hr>
                                        <h4 style="font-size: 18px">Do not have an account?</h4>
                                        <a href="{{route('register')}}" title="Login" class="btn btn-outline-primary
                                        mt-3
                                        free">Sign
                                            Up</a>
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
