@extends('layouts.manager_layout')
@section('title','Edit Notification')
@section('content')
    @include('includes.ckeditor')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <h5>Create Notifications</h5>
                <hr>
                <form action="{{route('manager-notification.update',$notification->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-7 col-lg-7">
                            <label class="form-check-label" for="email">
                                Email Notification(optional):
                            </label>
                            <select class="form-select" aria-label="Default select example" name="email"
                            >
                                <option selected value="">Email to</option>
                                <option value="Client">Email Notification to client</option>
                                <option value="Writer"> Email Notification to Writers</option>

                            </select>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <label class="form-check-label" for="category">
                                Visibility:
                            </label>
                            <select class="form-select" aria-label="Default select example" name="category"
                            >
                                <option value="{{$notification->category}}">{{$notification->category}}</option>
                                <option value="writer">Writers</option>
                                <option value="client">Client</option>
                                <option value="all" selected>All</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group required mt-3 row">
                        <div class="col-sm-12 col-md-7 col-lg-7">
                            <label class="control-label" for="title">
                                Title
                            </label><br>
                            <input type="text" required name="title" id="title" placeholder="Notification Title"
                                   class="complete"  value="{{$notification->title}}" style="width: 400px">
                            <small class="text-danger">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <label class="control-label" for="status">
                                Status
                            </label><br>
                            <select class="form-select complete" name="status" required id="status">

                                <option value="1" selected>Visible</option>
                                <option value="0" >Hidden</option>

                            </select>
                            <small class="text-danger">
                                @error('status')
                                {{ $message }}
                                @enderror
                            </small>

                        </div>
                    </div>

                    <div class="form-group required row mt-3">
                        <div class="col-12">
                            <label for="body" class="control-label">Notification Body:</label><br>
                            <textarea id="body" name="body" class="form-control" required>
                                   {{$notification->body}}
                                </textarea>

                            <small class="text-danger">
                                @error('body')
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
        CKEDITOR.replace( 'body', );
    </script>
@endsection

