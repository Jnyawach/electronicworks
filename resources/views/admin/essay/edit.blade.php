@extends('layouts.admin_layout')
@section('title', 'Edit essay')
@section('body-class', 'green-body')
@include('includes.ckeditor')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">
            <section>
                <form action="{{route('essay.update', $essay->id)}}" method="POST">
                    @method('PATCH')

                    @csrf
                    <div class="form-group row required">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="words" class="control-label">Word:</label>
                            <input type="text" id="words" class="form-control complete"
                                   aria-describedby="words" required name="words" value="{{$essay->words}}">
                            <small class="text-danger">
                                @error('words')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="delivery" class="control-label">Duration:</label>
                            <input type="text" id="delivery" class="form-control complete"
                                   aria-describedby="delivery" required name="delivery" value="{{$essay->delivery}}">
                            <small class="text-danger">
                                @error('delivery')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-group row required mt-3">
                        <div class="col-12">
                            <label for="title" class="control-label">Essay Title & Description:</label>
                            <textarea class="form-control" id="title" name="title">{{$essay->title}}</textarea>
                            <small class="text-danger">
                                @error('title')
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
        CKEDITOR.replace( 'title', );
    </script>
@endsection

