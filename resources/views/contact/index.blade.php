@extends('layouts.main')
@section('title', 'Reach Us')
@section('content')
    <section class="contact">
        <div  class="row">
            <div class="col-sm-11 col-md-10 col-lg-9 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <form method="POST" action="{{route('contact.store')}}">
                            @csrf
                            <input type="hidden" name="filter" value="">
                            <div class="row">
                                <div class="col-sm-10 col-md-5 col-lg-6 mx-auto mt-3">
                                    <h5 class=" mb-3">How can we help you?</h5>
                                    <div class="form-check mb-3">
                                        <input type="radio" class="form-check-input" id="order" name="issue"
                                               value="order">
                                        <label class="form-check-label" for="order">Get help about an existing order</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="radio" class="form-check-input" id="team" name="issue"
                                               value="account">
                                        <label class="form-check-label" for="team">Get help about your account</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="radio" class="form-check-input" id="query" name="issue"
                                               value="issue">
                                        <label class="form-check-label" for="query">I have a different issue</label>

                                    </div>

                                    <small class="text-danger">
                                        @error('issue')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-10 col-md-5 col-lg-6 mx-auto mt-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control incomplete" placeholder="Full Name"
                                                name="name" value="{{old('name')}}" required>
                                        <small class="text-danger">
                                            @error('name')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control incomplete" placeholder="Email address"
                                               name="email" value="{{old('email')}}" required>
                                        <small class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                        </div>
                                        <input type="text" class="form-control incomplete" placeholder="Subject"
                                              value="{{old('subject')}}" name="subject" required>
                                        <small class="text-danger">
                                            @error('subject')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="form-group">
                                 <textarea class="form-control" rows="7" id="message" rows="3"
                                      placeholder="Message" required name="body">{{old('body')
                                      }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </section>
    <section class="green-body">
        <div class="container p-3 mt-5">
            <div class="row">
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto">
                    <img src="images/map-green.png" alt="site map" class="img-fluid">
                </div>
                <div class="col-sm-11 col-md-7 col-md-7 mx-auto mt-3">
                    <h5>Electronics House, Suite No.405. Nairobi</h5>
                    <p>Email: mail@electronicworks.com</p>
                    <p>Tel: +254 717 109280</p>
                </div>
            </div>
        </div>

    </section>
@endsection
