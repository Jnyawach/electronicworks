@extends('layouts.admin_layout')
@section('title', 'Notifications')
@section('content')

    <div class="dashboard-wrapper green-body pt-5">
    <div class="container-fluid dashboard-content">
        <div class="container">
            <h5>All Notifications</h5>
            <hr>
            @include('includes.status')
            <div class="row mt-3">
                @if(isset($notifications))

                    <div class="col-12 mx-auto">


                            @foreach($notifications as $notification)
                                <div class="accordion accordion-flush" id="accordion{{$notification->id}}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading{{$notification->id}}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse{{$notification->id}}" aria-expanded="false"
                                                    aria-controls="flush-collapse{{$notification->id}}">
                                                @if($notification->status==1)
                                                <h5 class="fs-5">{{$notification->title}}</h5>
                                                    @elseif($notification->status==0)
                                                    <h5 class="fs-5 text-secondary">{{$notification->title}} (disabled)</h5>
                                                    @endif



                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{$notification->id}}" class="accordion-collapse collapse"
                                             aria-labelledby="flush-heading{{$notification->id}}" data-bs-parent="#accordion{{$notification->id}}">
                                            <div class="accordion-body">
                                                <p>
                                                    {!! $notification->body !!}
                                                </p>
                                                <p><span>{{$notification->created_at->diffForHumans()}}</span></p>
                                                <div class=" d-inline-flex">

                                                    <a href="{{route('notifications.edit', $notification->id)}}"
                                                       title="Edit" class="btn
                                            btn-primary hire
                                            m-1">Edit<i
                                                            class="fas fa-external-link-alt ms-2"></i></a>
                                                    <form method="POST" action="{{route('notifications.destroy',
                                                    $notification->id)}}" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-primary hire m-1" title=" delete"
                                                        >Delete <i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                    @if($notification->status==0)

                                                        <form method="POST" action="{{route('note', $notification->id)
                                                        }}">
                                                            @method(' PATCH')
                                                            @csrf
                                                            <input type="hidden" name="status" value="1">
                                                            <button type="submit"
                                                                    class="btn btn-primary hire m-1" title=" delete"
                                                            >Enable <i class="fas fa-history"></i></button>
                                                        </form >

                                                    @else
                                                        <form method="POST" action="{{route('note', $notification->id)
                                                        }}">
                                                            @method('PATCH')
                                                            @csrf
                                                            <input type="hidden" name="status" value="0">
                                                            <button type="submit"
                                                                    class="btn btn-primary hire m-1" title=" delete"
                                                            >Disable <i class="fas fa-history"></i></button>
                                                        </form>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endforeach


                        </div>
                    {{$notifications->links()}}

                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
