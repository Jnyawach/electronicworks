@extends('layouts.main')
@section('title','Find Writers')
@section('content')
    <!-- start of Body-->
    <main class="pt-5">
        <section class="mt-5 writers">

            <div class="container mt-5 ">
                <div class="row mt-4">
                    <div class=" col-sm-11 col-md-8 col-lg-8">
                        <h5>Find the best writers</h5>
                        <ul class="nav nav-fill mt-5">
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-current="page" href="#"><h4>Filter:</h4></a>
                            </li>
                            <li class="nav-item ms-2">
                                <form>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>orders</option>
                                        <option value="1">100+ orders</option>
                                        <option value="3">500+ orders</option>

                                    </select>
                                </form>

                            </li>
                            <li class="nav-item ms-2">
                                <form>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Rating</option>
                                        <option value="1">Highest</option>
                                        <option value="3">Lowest</option>
                                    </select>
                                </form>
                            </li>
                            <li class="nav-item ms-2">
                                <form>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Discipline</option>
                                        <option value="1">History</option>
                                        <option value="3">Art</option>
                                    </select>
                                </form>
                            </li>
                            <li class="nav-item ms-2">
                                <form>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Active writers</option>
                                        <option value="1">Currently online</option>

                                    </select>
                                </form>
                            </li>

                        </ul>
                        <div>
                            @if($writers->count()>0)
                            @foreach($writers as $writer)
                            <!--link to writers profile-->
                            <a href="#" class="text-decoration-none">
                                <div class="mt-5 row item p-3">
                                    <div class="col-sm-6 col-md-3 col-lg-3">
                                        <img src="{{url($writer->getFirstMedia('avatar')? $writer->getFirstMedia('avatar')
                                   ->getUrl('avatar_card'):'/images/no-image.png' )}}" class="img-fluid float-start me-3" style="height: 60px">
                                        <h5 class="mt-2 fs-5 fw-bold">{{$writer->name}}</h5>
                                        <h4 style="font-size: 13px">
                                            @if($writer->isOnline())
                                                Online
                                                @else
                                                last seen {{\Carbon\Carbon::parse($writer->last_seen)->diffForHumans()}}
                                                @endif
                                        </h4>
                                    </div>

                                    <div class="col-sm-6 col-md-3 col-lg-3 text-center">
                                        @if($writer->reviewing->count()>0)
                                        <h6>{{$writer->reviewing->sum('stars')/$writer->reviewing->count()}} /5</h6>

                                        <h4> @for($i = 0; $i < 5; $i++)
                                            <i class="fa{{ $writer->reviewing->sum('stars')/$writer->reviewing->count()  <= $i ? 'r' : '' }} fa-star"></i>

                                            @endfor
                                        </h4>
                                            @else
                                                <h4>No Reviews</h4>
                                            @endif


                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-3 text-center">
                                        <h6>{{$writer->jobs?$writer->jobs->count():'0'}}</h6>
                                        <h4>Orders completed</h4>

                                    </div>

                                </div>
                            </a>
                            <hr class="dropdown-divider">
                                @endforeach
                                @else
                                <h5 class="m-3">There are no registered writers currently</h5>
                                @endif

                        </div>


                        <div class="row mt-5">
                            <div class="col-10 mx-auto text-center">
                                <nav  class="nav justify-content-center">
                                    {{$writers->links()}}

                                </nav>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-11 col-md-4 col-lg-4 mx-auto">
                       @include('includes.statistics')

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--End of Body-->
@endsection
