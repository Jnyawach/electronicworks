@extends('layouts.admin_layout')
@section('title','Edit Policy')
@section('content')
    @include('includes.ckeditor')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">

                <h5>Create Policy and terms</h5>
                <hr class="dropdown-divider">
                <form method="POST" action="{{route('policy.update', $policy->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-11 col-md-5 col-lg-5 ">
                            <label for="category" class="control-label">Category:</label>
                            <select class="form-select" aria-label="category" id="category" name="category" required>
                                <option selected value="{{$policy->category}}">{{$policy->category}}</option>
                                <option value="Policy">Policy</option>
                                <option value="Terms">Terms</option>
                            </select>
                            <small class="text-danger">
                                @error('category')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-sm-11 col-md-5 col-lg-5 ">
                            <label for="status" class="control-label">Status:</label>
                            <select class="form-select" aria-label="status" id="status" name="status" required>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>

                            </select>
                            <small class="text-danger">
                                @error('status')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="policy" class="control-label">Policy Document:</label><br>
                            <textarea id="policy" name="text" class="form-control" id="policy">
                                    {{$policy->text}}
                                </textarea>

                            <small class="text-danger">
                                @error('text')
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
        CKEDITOR.replace( 'policy', );
    </script>
@endsection

