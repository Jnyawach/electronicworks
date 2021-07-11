@extends('layouts.main')
@section('title', 'Add your Details')
@section('content')
    <section class="become">
        <div class="row">
            <div class="col-sm-11 col-md-10 col-md-10 mx-auto">
                <div class="card shadow-sm mb-5">
                    <div class="card-header">
                        <h5>Become a Freelance Writer with Us</h5>
                    </div>
                    <div class="card-body pt-3 pb-5">
                        <form id="msform">


                            <ul id="progressbar" class="mt-5 text-center">
                                <li class="active d-inline m-1">1. Email Setup</li>
                                <li class="d-inline m-1">2. Profile Setup</li>
                                <li class="d-inline m-1">3. Grammar Test</li>
                                <li class="d-inline m-1">4. Essay Test</li>
                            </ul>
                            <fieldset>
                                <h4 class="fs-title" style="font-size: 20px">Register as writer Step 2 of 4</h4>

                                <h4 class="m-5" style="font-size: 18px">Email & Login: <span>{{Auth::user()
                                ->email}}</span></h4>

                                <div class="form-group row m-3 required">
                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="fname" class="control-label">First Name:</label>
                                        <input type="text" id="fname" class="form-control complete"
                                               aria-describedby="fname" required value="{{old('name')}}" name="name">
                                        <small class="text-danger">
                                            @error('name')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="lname" class="control-label">Last Name:</label>
                                        <input type="text" id="lname" class="form-control complete"
                                               aria-describedby="lname" required value="{{old('last_name')}}"
                                               name="last_name">
                                        <small class="text-danger">
                                            @error('last_name')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row required m-3 ">
                                    <div class="col-11 mx-auto">
                                        <label for="gender" class="control-label">Gender:</label>
                                        <select class="form-select" aria-label="gender" id="gender" required>
                                            <option selected value="">Click to select</option>
                                            <option value="1">Female</option>
                                            <option value="2">Male</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row required m-3 ">
                                    <div class="col-sm-11 col-md-3 col-lg-3 mx-auto">
                                        <label for="country" class="control-label">Country:</label>
                                        <select class="form-select" required aria-label="country" id="country">
                                            <option selected value="Kenya">Kenya</option>


                                        </select>
                                    </div>
                                    <div class="col-sm-11 col-md-3 col-lg-3 mx-auto">
                                        <label for="city" class="control-label">City:</label>
                                        <input type="text" id="city" class="form-control complete"
                                               aria-describedby="city" required>
                                    </div>
                                    <div class="col-sm-11 col-md-3 col-lg-3 mx-auto">
                                        <label for="zip" class="control-label">Zip:</label>
                                        <input type="text" id="zip" class="form-control complete"
                                               aria-describedby="zip" required>
                                    </div>
                                </div>
                                <div class="form-group row required m-3 ">
                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="phone" class="control-label">Cellphone:</label>
                                        <input type="tel" id="phone" class="form-control complete"
                                               aria-describedby="phone" required>
                                        <small>Please submit a phone number where you can be reached</small>
                                    </div>
                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="night-calls" class="control-label">Available for Night calls:</label>
                                        <select class="form-select" aria-label="night-calls" id="night-calls" required>
                                            <option selected>Click to select</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row required m-3 ">
                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="formFile" class="control-label">Government issued Id.</label>
                                        <input class="form-control" type="file" id="formFile">
                                        <small>You can upload only .jpg .jpeg .png .pdf</small>
                                    </div>

                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="language" class="control-label">What is your native language?:</label>
                                        <input type="text" id="language" class="form-control complete"
                                               aria-describedby="language" required>
                                    </div>
                                </div>

                                <hr class="mt-5">
                                <h4 class="m-5" style="font-size: 18px">Education</h4>
                                <div class="form-group row required m-3">
                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="university" class="control-label">Name of university:</label>
                                        <input type="text" id="university" class="form-control complete"
                                               aria-describedby="university" required>
                                    </div>

                                    <div class="col-sm-11 col-md-5 col-lg-5 mx-auto">
                                        <label for="department" class="control-label">Department:</label>
                                        <input type="text" id="department" class="form-control complete"
                                               aria-describedby="department" required>
                                    </div>
                                </div>

                                <div class="form-group row required m-3">
                                    <div class="col-sm-11 col-md-7 col-lg-6 mx-auto">
                                        <label for="course" class="control-label">Course:</label>
                                        <input type="text" id="course" class="form-control complete"
                                               aria-describedby="course" required>
                                    </div>
                                    <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                                        <label for="graduation" class="control-label">Year of graduation:</label>
                                        <input type="text" id="graduation" class="form-control complete"
                                               aria-describedby="graduation" required>
                                    </div>
                                </div>

                                <div class="form-group row required m-5">
                                    <div class="col-sm-11 col-md-5 col-lg-5">
                                        <label for="cert" class="control-label">Certificate.</label>
                                        <input class="form-control" type="file" id="cert">
                                        <small>You can upload only .jpg .jpeg .png .pdf</small>
                                        <small>Please upload a copy of the highest academic qualification
                                            you have received</small>
                                    </div>
                                </div>
                                <hr class="dropdown-divider">
                                <button type="submit" class="btn btn-primary float-end">NEXT <i class="fas
                                fa-long-arrow-alt-right ms-2"></i></button>



                            </fieldset>




                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
