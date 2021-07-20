@extends('layouts.admin_layout')
@section('title','Create Faqs')
@section('content')
    @include('includes.ckeditor')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container ">

                <h5>Create Frequently asked Question</h5>
                <hr class="dropdown-divider">

                <form class="mt-5 " method="POST" action="{{route('faqs.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="category" class="control-label">Category:</label>
                        <select class="form-select complete" name="faq_category_id" required id="category">
                            <option selected value="">Select Category</option>
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
                            <div class="form-group required row">
                                <div class="col-12">
                                <label for="question" class="control-label">Quiz:</label><br>
                                <textarea id="question" name="question" class="form-control">
                                    {{old('question')}}
                                </textarea>

                                <small class="text-danger">
                                    @error('question')
                                    {{ $message }}
                                    @enderror
                                </small>
                                </div>
                            </div>
                    <div class="form-group row mt-3">
                        <div class="col-12">
                            <label for="policy" class="control-label">Answer:</label><br>
                            <textarea id="answer" name="answer" class="form-control">
                                    {{old('answer')}}
                                </textarea>

                            <small class="text-danger">
                                @error('answer')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'answer', );
    </script>
@endsection
