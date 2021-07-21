@extends('layouts.admin_layout')
@section('title', 'Faqs')
@section('content')

    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">

            <div class="container ">
                <!--Delayed projects-->
                <h5>All Frequently asked questions</h5>
                <hr>
               @include('includes.status')
                <div class="row mt-3">
                    @if($categories->count()>0)
                        @foreach($categories as $category)
                    <div class="col-12 mx-auto">
                        <h4 class="mt-5">{{$category->name}}</h4>
                        @foreach($category->faqs as $faq)
                        <div class="accordion accordion-flush" id="accordion{{$faq->id}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{$faq->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{$faq->id}}" aria-expanded="false"
                                            aria-controls="flush-collapse{{$faq->id}}">
                                        {{$faq->question}}


                                    </button>
                                </h2>
                                <div id="flush-collapse{{$faq->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-heading{{$faq->id}}" data-bs-parent="#accordion{{$faq->id}}">
                                    <div class="accordion-body">
                                        <p>
                                            {!! $faq->answer !!}
                                        </p>
                                        <div class=" d-inline-flex">

                                            <a href="{{route('faqs.edit', $faq->id)}}" title="Edit" class="btn
                                            btn-primary hire
                                            m-1">Edit<i
                                                    class="fas fa-external-link-alt ms-2"></i></a>
                                            <form method="POST" action="{{route('faqs.destroy', $faq->id)}}" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-primary hire m-1" title=" delete"
                                                >Delete <i class="far fa-trash-alt"></i></button>
                                            </form>
                                            @if($faq->status==0)

                                            <form method="POST" action="{{route('frequent', $faq->id)}}">
                                                @method(' PATCH')
                                                @csrf
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit"
                                                        class="btn btn-primary hire m-1" title=" delete"
                                                >Enable <i class="fas fa-history"></i></button>
                                            </form >

                                                @else
                                                <form method="POST" action="{{route('frequent', $faq->id)}}">
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
                        @endforeach
                        @endif
                </div>


            </div>

        </div>

    </div>
@endsection
