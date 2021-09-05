@extends('layouts.client_layout')
@section('title','Notifications')
@section('content')
    <section>
        <h5>Notifications</h5>
        <hr class="dropdown-divider">
        <div class="row p-5">
            @if($notifications->count()>0)

                @foreach($notifications as $notification)
                    <div class="col-12 ">
                        <h5>{{$notification->title}}</h5>
                        <a href="{{route('client-notification.show', $notification->slug)}}" title="Read More"
                           class="text-decoration-none notification" >
                            <p>{!! \Coduo\PHPHumanizer\StringHumanizer::truncate($notification->body, 250,'...') !!}</p>
                        </a>
                        <hr class="dropdown-divider">
                    </div>
                @endforeach
                <div class="text-center">
                    {{$notifications->links()}}
                </div>

            @else
                <h4>There are no notifications available</h4>
            @endif
        </div>
    </section>
@endsection
