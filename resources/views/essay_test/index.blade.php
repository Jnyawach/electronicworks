@extends('layouts.main')
@section('title', 'English Test')
@section('content')
    @include('includes.ckeditor')
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
                            <li class="  d-inline m-1">3. Grammar Test</li>
                            <li class="active d-inline m-1">4. Essay Test</li>
                        </ul>
                        <h4 class="fs-title" style="font-size: 20px">Register as writer Step 4 of 4</h4>

                        <form id="msform" action="{{route('essay_test.store')}}" method="POST">

                            @csrf
                            @foreach($essay as $test)
                            <fieldset>
                                <div class="m-3">
                                    <h5>Essay title:</h5>
                                    <h4 style="font-size: 20px">{!! $test->title !!}</h4>
                                    <h4 style="font-size: 20px">Time: {{$test->delivery}}hr</h4>
                                    <h4 style="font-size: 20px">Words: {{$test->words}}</h4>
                                    <div class="form-group">
                                        <input type="hidden" value="{{$test->id}}" name="test_id">
                                    </div>
                                    <small class="text-danger">
                                        @error('essay_body')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                    <div class="form-group">
                                        <textarea class="form-control" name="essay_body"
                                                  id="essay" >{{old('essaY_body')}}</textarea>
                                    </div>

                                </div>
                               <button type="submit" class="btn btn-primary float-end">SUBMIT</button>


                            </fieldset>
                                @endforeach

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'essay', );
        CKEDITOR.instances.editor1.wordCount.wordCount;

    </script>
    @endsection

