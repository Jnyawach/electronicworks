@extends('layouts.manager_layout')
@section('title', 'Support')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <h5>Support Messages</h5>
                <hr>
                @include('includes.status')
                @if($messages->count()>0)

                    <table class="table contacts" >

                        <tbody>
                        @foreach($messages as $message)
                            @if($message->status==0)
                                <tr class="unread">

                                    <td>{{$message->name}}</td>
                                    <td>{!! Illuminate\Support\Str::limit($message->body, 50) !!}</td>
                                    <td>{{$message->created_at->diffForHumans()}}</td>
                                    <td><a href="{{route('support.show',$message->id)}}" title="read">
                                            <i class="fas fa-bookmark ms-2"></i></a></td>
                                    <td>
                                        <form action="{{route('manager-contact.destroy',$message->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn-sm"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('manager-contact.update',$message->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="btn-sm" title="Mark as Read"><i class="fas
                                    fa-envelope"></i></button>
                                        </form>

                                    </td>
                                    @if(is_null($message->response))
                                        <td class="text-danger" title="Not Replied"><i class="fas fa-calendar-check"></i></td>
                                    @else
                                        <td class="text-success" title="Replied"><i class="fas fa-calendar-check"></i></td>
                                    @endif

                                </tr>
                            @else
                                <tr>

                                    <td>{{$message->name}}</td>
                                    <td>{!! Illuminate\Support\Str::limit($message->body, 50) !!}</td>
                                    <td>{{$message->created_at->diffForHumans()}}</td>
                                    <td><a href="{{route('manager-contact.show',$message->id)}}" title="read">
                                            <i class="fas fa-bookmark ms-2"></i></a></td>
                                    <td>
                                        <form action="{{route('manager-contact.destroy',$message->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn-sm"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('manager-contact.update',$message->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" class="btn-sm" title="Mark as Unread"><i class="fas
                                    fa-envelope"></i></button>
                                        </form>
                                    </td>
                                    @if(is_null($message->response))
                                        <td class="text-danger" title="Not Replied"><i class="fas fa-calendar-check"></i></td>
                                    @else
                                        <td class="text-success" title="Replied"><i class="fas fa-calendar-check"></i></td>
                                    @endif

                                </tr>
                            @endif

                        @endforeach


                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

