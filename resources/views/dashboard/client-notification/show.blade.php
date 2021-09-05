@extends('layouts.client_layout')
@section('title','Notifications')
@section('content')
    <section class="p-3">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <h5 class="fw-bold">{{$notification->title}}</h5>
                <p>{!! $notification->body !!}</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h5>Recent Notifications</h5>
                <div class="green-body p-3">
                    @if( $latestNotification->count()>0)
                        @foreach($latestNotification as $latest)
                            <a href="{{route('client-notification.show', $notification->slug)}}" class="text-decoration-none"
                               title="Read More">
                                <h4 class="fs-6">{{\Coduo\PHPHumanizer\StringHumanizer::truncate($latest->title,25,'...')}}</h4>
                            </a>
                            <hr class="dropdown-divider">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
