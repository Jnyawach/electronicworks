@extends('layouts.admin_layout')
@section('title', $message->subject)
@section('content')
    @include('includes.ckeditor')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <div class="card">
                    <div class="card-header p-1">
                        <h5 class="fs-5 text-capitalize m-1">{{$message->subject}}
                        <div class="dropdown float-end m-0">
                            <button class="btn m-0 " type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions<i class="fas fa-ellipsis-v ms-2"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <form action="{{route('support.destroy',$message->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn dropdown-item">Delete <i class="far
                                        fa-trash-alt"></i></button>
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="{{route('support.index')}}">Exit<i
                                            class="fas fa-external-link-alt ms-2"></i></a></li>
                            </ul>
                        </div>
                        </h5>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            {{$message->name}}
                            &nbsp;{{$message->email}}&nbsp;
                            <span>{{$message->created_at->diffForHumans()}}</span>
                        </h4>
                        <hr class="dropdown-divider">
                        <p class="card-text">
                            {{$message->body}}
                        </p>
                        <hr class="dotted">
                        @if(is_null($message->response))
                            <form action="{{route('response',$message->id)}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="form-group row mt-3">
                                    <div class="col-12">
                                        <label for="policy" class="control-label">Type Response:</label><br>
                                        <textarea id="response" name="response" class="form-control">
                                    {{old('response')}}
                                </textarea>

                                        <small class="text-danger">
                                            @error('response')
                                            {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">SEND</button>
                                </div>

                            </form>
                            @else
                            <div class="bg-light p-3">
                            <h5 >Replying to {{$message->name}}</h5>
                                <h4>{{$message->updated_at->diffForHumans()}}</h4>
                            </div>
                            <p class="card-text">{!! $message->response !!}</p>
                            @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'response', );
    </script>
@endsection
