@extends('layouts.main')
@section('title', 'English Test')
@section('content')
    <section class="become">
        <div class="row">
            <div class="col-sm-11 col-md-10 col-md-10 mx-auto">
                <div class="card shadow-sm mb-5">
                    <div class="card-header">
                        <h5>Become a Freelance Writer with Us</h5>
                    </div>
                    <div class="card-body pt-3 pb-5">
                        <ul id="progressbar" class="mt-5 text-center">
                            <li class=" d-inline m-1">1. Email Setup</li>
                            <li class=" d-inline m-1">2. Profile Setup</li>
                            <li class=" active d-inline m-1">3. Grammar Test</li>
                            <li class="d-inline m-1">4. Essay Test</li>
                        </ul>
                        <h4 class="fs-title" style="font-size: 20px">Register as writer Step 3 of 4</h4>

                        <form id="msform" action="{{route('english_test.store')}}" method="POST">

                            @csrf
                            <fieldset>
                                @foreach($english  as $test)
                                    <div class="ms-3">
                                        <p>{!! $test->quiz !!}</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{$test->id}}"
                                                   id="{{$test->choice_a }}" value="{{$test->choice_a }}">
                                            <label class="form-check-label" for="{{$test->choice_a }}">
                                                A) {!! $test->choice_a !!}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{$test->id}}"
                                                   id="flexRadioDefault{{$test->id}}" value="{{$test->choice_b }}">
                                            <label class="form-check-label" for="flexRadioDefault{{$test->id}}">
                                                B) {!! $test->choice_b !!}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{$test->id}}"
                                                   id="flexRadioDefault{{$test->id}}" value="{{$test->choice_c }}">
                                            <label class="form-check-label" for="flexRadioDefault{{$test->id}}">
                                                C) {!! $test->choice_c !!}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="float-end">

                                   <button type="submit" class="btn btn-primary">NEXT <i class="fas
                                fa-long-arrow-alt-right ms-2"></i></button>
                                </div>



                            </fieldset>





                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

