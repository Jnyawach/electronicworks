@extends('layouts.admin_layout')
@section('title', 'Add Writer')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    @endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">


            <h5>Add Writer</h5>
            <hr class="dropdown-divider">
            <h4>Writer details</h4>
            <div class="row">
                <div class="col-12">
                    <form class="m-4" method="POST" action="{{route('writer.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role_id" value="3">
                        <input type="hidden" name="status_id" value="1">
                        <div class="form-group row mt-3 required">
                            <div class="col-sm-11 col-md-5 col-lg-5 ">
                                <label for="name" class="control-label">First Name:</label>
                                <input type="text" id="name" name="name" class="form-control complete"
                                       aria-describedby="name" required placeholder="First Name" value="{{ old('name')
                                       }}">
                                <small class="text-danger">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-sm-11 col-md-5 col-lg-5">
                                <label for="last_name" class="control-label">Last Name:</label>
                                <input type="text" id="last_name" name="last_name" class="form-control complete"
                                       aria-describedby="last_name" required placeholder="Last Name" value="{{old
                                       ('last_name')}}">
                                <small class="text-danger">
                                    @error('last_name')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-11 col-md-5 col-lg-5">
                                <label for="email" class="control-label">Email:</label>
                                <input type="email" class="form-control complete" placeholder="Email Address"
                                       aria-label="email" name="email" required id="email" value="{{ old('email') }}">

                                <small class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </small>
                            </div>
                        </div>

                        <div class="form-group row  required mt-3">
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="cellphone" class="control-label">Primary Cellphone:</label>
                                <input type="text" class="form-control complete " placeholder="Cellphone"
                                           aria-label="cellphone" name="cellphone" id="cellphone" value="{{old
                                           ('cellphone')}}">
                                <small class="text-danger">
                                    @error('cellphone')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="sec_cellphone">Secondary cellphone</label>
                                    <input type="text" class="form-control complete"
                                           placeholder="Secondary cellphone" value="{{old
                                           ('sec_cellphone')}}"  aria-label="sec_cellphone" name="sec_cellphone"
                                           id="sec_cellphone">


                                <small class="text-danger">
                                    @error('sec_cellphone')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>


                        </div>

                        <div class="form-group row required mt-3">
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="password" class="control-label">Password:</label>
                                <input type="password" class="form-control complete " placeholder="Password"
                                       aria-label="password" name="password" id="password">

                                <small class="text-danger">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 ">
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


                        </div>

                        <hr class="dotted">
                        <h4>Additional details</h4>

                        <div class="form-group row required mt-3 ">
                            <div class="col-sm-11 col-md-4 col-lg-4 ">
                                <label for="gender" class="control-label">Gender:</label>
                                <select class="form-select" aria-label="gender" id="gender" name="gender" required>
                                    <option selected value="">Click to select</option>
                                    @if(old('gender'))
                                    <option selected value="{{old('gender')}}">{{old('gender')}}</option>
                                    @endif
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>

                                </select>
                                <small class="text-danger">
                                    @error('gender')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-sm-11 col-md-4 col-lg-4">
                                <label for="language" class="control-label">What is your native language?:</label>
                                <input type="text" id="language" class="form-control complete"
                                       aria-describedby="language" required value="{{old('language')}}" name="language">
                                <small class="text-danger">
                                    @error('language')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-sm-11 col-md-4 col-lg-4">
                                <label for="night-calls" class="control-label">Available for Night calls:</label>
                                <select class="form-select" aria-label="night-calls" id="night-calls" required
                                        name="night_calls">
                                    <option selected value="">Click to select</option>
                                    @if(old('night_calls'))
                                    <option selected value="{{old('night_calls')}}">{{old('night_calls')}}</option>
                                    @endif
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>

                                </select>
                                <small class="text-danger">
                                    @error('night_calls')
                                    {{ $message }}
                                    @enderror
                                </small>

                            </div>
                        </div>

                        <div class="form-group row required mt-3 ">
                            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                                <label for="country" class="control-label">Country:</label>
                                @include('includes.country')
                                <small class="text-danger">
                                    @error('country')
                                    {{ $message }}
                                    @enderror
                                </small>

                            </div>
                            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                                <label for="city" class="control-label">City:</label>
                                <input type="text" id="city" class="form-control complete"
                                       aria-describedby="city" required name="city" value="{{old('city')}}">
                                <small class="text-danger">
                                    @error('city')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                                <label for="zip" class="control-label">Zip:</label>
                                <input type="text" id="zip" class="form-control complete"
                                       aria-describedby="zip" required name="zip" value="{{old('zip')}}">
                                <small class="text-danger">
                                    @error('zip')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="form-group row required mt-3 ">
                            <div class="col-sm-11 col-md-5 col-lg-5">
                                <label for="identity" class="control-label">Government issued Id.</label>
                                <input class="form-control" type="file" id="identity" name="identity">
                                <small class="text-danger">
                                    @error('identity')
                                    {{ $message }}
                                    @enderror
                                </small>
                                <small>You can upload only .jpg .jpeg .png .pdf</small>
                            </div>
                        </div>

                        <hr class="dotted">
                        <h4>Education details</h4>

                        <div class="form-group row required mt-3">
                            <div class="col-sm-11 col-md-5 col-lg-6 mx-auto">
                                <label for="university" class="control-label">Name of university:</label>
                                <input type="text" id="university" class="form-control complete"
                                       aria-describedby="university" required name="university" value="{{old
                                       ('university')}}">
                                <small class="text-danger">
                                    @error('university')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-sm-11 col-md-5 col-lg-6 mx-auto">
                                <label for="department" class="control-label">Department:</label>
                                <input type="text" id="department" class="form-control complete"
                                       aria-describedby="department" required name="department" value="{{old
                                       ('department')}}">
                                <small class="text-danger">
                                    @error('department')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="form-group row required mt-3">
                            <div class="col-sm-11 col-md-7 col-lg-6">
                                <label for="course" class="control-label">Course:</label>
                                <input type="text" id="course" class="form-control complete"
                                       aria-describedby="course" required name="course" value="{{old('course')}}">
                                <small class="text-danger">
                                    @error('course')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-sm-11 col-md-4 col-lg-4">
                                <label for="graduation" class="control-label">Year of graduation:</label>
                                <input type="text" id="graduation" class="form-control complete"
                                       aria-describedby="graduation" required name="graduation" value="{{old
                                       ('graduation')}}">
                                <small class="text-danger">
                                    @error('graduation')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="form-group row required mt-3">
                            <div class="col-sm-11 col-md-5 col-lg-5">
                                <label for="cert" class="control-label">Certificate.</label>
                                <input class="form-control" type="file" id="cert" name="cert">
                                <small class="text-danger">
                                    @error('cert')
                                    {{ $message }}
                                    @enderror
                                </small>
                                <small>You can upload only .jpg .jpeg .png .pdf</small>
                                <small>Please upload a copy of the highest academic qualification
                                    you have received</small>
                            </div>
                            <div class="col-sm-11 col-md-4 col-lg-4">
                                <label for="score" class="control-label">Test Score:</label>
                                <input type="text" id="score" class="form-control complete"
                                       aria-describedby="score" required name="score" value="{{old
                                       ('score')}}">
                                <small class="text-danger">
                                    @error('score')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-3 float-end">SUBMIT  &nbsp;<i class="fas
                                fa-long-arrow-alt-right ms-3"></i></button>

                            </div>
                        </div>


                    </form>
                </div>
            </div>



        </div>
    </div>
@endsection

