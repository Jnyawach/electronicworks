@extends('layouts.admin_layout')
@section('title', 'Set Exams')
@section('body-class', 'green-body')
@include('includes.ckeditor')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">
    <section>
        <form action="{{route('exam.store')}}" method="POST">

            @csrf
            <div class="form-group">
                <label for="category" class="control-label">Category:</label>
                <select class="form-select complete" name="category_id" required id="category">
                    <option selected value="">Select Status</option>
                    @foreach($category as $id=>$categories)
                        <option value="{{$id}}">{{$categories}}</option>
                    @endforeach

                </select>
                <small class="text-danger">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </small>
            </div>

                <div class="form-group row required">
                    <div class="col-12 mx-auto">
                        <label for="exam" class="control-label">Question:</label>
                        <textarea class="form-control" id="exam" name="quiz">{{old('quiz')}}</textarea>
                        <small class="text-danger">
                            @error('quiz')
                            {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="form-group row mt-3 required">
                    <div class="col-sm-11 col-md-6 col-lg-5  ">
                        <label for="choice_a" class="control-label">Choice A:</label>
                        <textarea class="form-control" id="choice_a" name="choice_a">{{old('choice_a')}}</textarea>
                        <small class="text-danger">
                            @error('choice_a')
                            {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-sm-11 col-md-6 col-lg-6 ">
                        <label for="choice_b" class="control-label">Choice B:</label>
                        <textarea class="form-control" id="choice_b" name="choice_b">{{old('choice_b')}}</textarea>
                        <small class="text-danger">
                            @error('choice_b')
                            {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="form-group required row">
                    <div class="col-sm-11 col-md-6 col-lg-6">
                        <label for="choice_c" class="control-label">Choice C:</label>
                        <textarea class="form-control" id="choice_c" name="choice_c">{{old('choice_c')}}</textarea>
                        <small class="text-danger">
                            @error('choice_c')
                            {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-sm-11 col-md-6 col-lg-6">
                        <label for="answer" class="control-label">Answer:</label>
                        <textarea class="form-control" id="answer" name="answer">{{old('answer')}}</textarea>
                        <small class="text-danger">
                            @error('answer')
                            {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

          <div class="form-group mt-4">
              <button type="submit" class="btn btn-primary">SUBMIT</button>
          </div>

        </form>
    </section>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'exam', );
    </script>
@endsection

