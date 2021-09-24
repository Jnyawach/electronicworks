@extends('layouts.writer')
@section('title','inbox')
@section('content')
    <h5 class="fw-bold">Ask a question about a project that is ongoing</h5>
    <hr class="dropdown-divider">
    <div class="chat p-2 pt-5">
        <div class="messaging" >
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h5>Recent</h5>
                        </div>
                        <div class="srch_bar">
                            <form>
                                <div class="stylish-input-group">
                                    <input type="text" class="search-bar"  placeholder="Search" >
                                    <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
                            </form>
                        </div>
                    </div>
                    <div class="inbox_chat">
                        @if($projects->count()>0)
                            @foreach($projects as $project)
                        <div class="chat_list active_chat">
                            <div class="chat_people">
                                <div class="chat_ib">
                                    <h5 class="text-uppercase fw-bold">{{$project->sku}}</h5>
                                    <p>{{$project->messages->last()?$project->messages->last()->body:''}}</p>
                                    <h4 class="fw-bold" style="font-size: 13px"><span>7:50AM</span></h4>
                                </div>
                            </div>
                        </div>
                            @endforeach
                            @endif

                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history">
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Test which is a new approach to have all
                                        solutions</p>
                                    <span class="time_date d-inline-flex"> 11:01AM | June 9
                                <form >
                                    <button type=" submit" class="btn m-0 p-0"><i class="far fa-trash-alt"></i></button>
                                </form>
                                </span></div>
                            </div>
                        </div>
                        <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>Test which is a new approach to have all
                                    solutions</p>
                                <span class="time_date d-inline-flex"> 11:01 AM    |    June 9 |
                                 <form >
                                    <button type=" submit" class="btn m-0 p-0"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </span> </div>
                        </div>
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Test, which is a new approach to have</p>
                                    <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                            </div>
                        </div>
                        <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>Apollo University, Delhi, India Test</p>
                                <span class="time_date"> 11:01 AM    |    Today</span> </div>
                        </div>
                        <div class="incoming_msg ">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg ">
                                    <p >We work directly with our designers and suppliers,
                                        and sell direct to you, which means quality, exclusive
                                        products, at a price anyone can afford.</p>
                                    <span class="time_date"> 11:01 AM    |    Today</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form action="{{route('chat.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="project" value="{{$activeChat->id}}">
                                <input type="hidden" name="receiver" value="{{$activeChat->client_id}}">

                                <input type="textarea" class="write_msg" placeholder="Type a message" name="body" />
                                <button class="msg_send_btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div></div>
@endsection

