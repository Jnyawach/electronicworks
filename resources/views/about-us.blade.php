@extends('layouts.main')
@section('title','Why Electronic Works')
@section('body-class','green-body')
@section('content')
    <section class="pt-5">
        <div class="container mt-5 about-card">
            <div class="row">
                <div class="col-sm-11 col-md-7 col-lg-8 mx-auto">

                            <h5>Why Electronic Works?</h5>
                    <p>What's more, our customers do not need to commit to a writer or send any payment
                                before they settle for a writer whose working approach resonates with them. Such an
                                innovative approach allows us to create clear competition
                                among our writers and motivates them to work at their best.</p>
                            <p>First, our writers check instructions and deadlines of orders,
                                and place their bids in accordance with the complexity and the urgency
                                of particular orders. The system automatically adds a service fee and the
                                total price is displayed to the customer. Then the customer is able to
                                compare all of the bids that different writers suggest for their work,
                                as well as get acquainted with each writer's level of cooperation and
                                writing skills by watching him or her start working on the order.
                                This way, a customer can settle for a particular writer whose approach
                                to work and bid requested is most suitable for his or her needs.</p>
                            <p>On the other hand, we know that half of the process depends on customers
                                and their ability to articulate instructions in an effective way.
                                Their views on desired final products must be made clear to the writers.
                                So, in an effort to encourage customers to communicate with writers in the
                                best possible manner, we have invented the customer rating system.
                                All our writers can rate their customers' level of cooperation with an order's successful
                                completion, and writers too have the unique
                                opportunity to choose the customer with whom they want to work.</p>
                            <p>All in all, EssayShark.com offers a convenient, simple,
                                and unique platform for collaboration between customers who
                                struggle with their studying and professional writers willing and able
                                to dedicate their skills towards customers' academic success. Our mission is
                                to make both sides satisfied with the final product. We believe no other company
                                on the market can
                                offer a better solution to make that happen. Try now and decide for yourself!</p>

                </div>
                <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                    <div class="card shadow-sm mt-3">
                        <div class="card-header">
                            <h5>Electronic Works Statistics</h5>
                        </div>
                        <div class="card-body">
                            <h6><span><i class="fas fa-star">
                           </i><i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                           </span>4.5/5 &nbsp;| &nbsp;800 Reviews</h6>
                            <h6><span>100K+</span> &nbsp;Visitors per month</h6>
                            <h6><span>{{$writers->count()}}</span> &nbsp;Active Writers</h6>
                            <h6><span>{{$projects->count()}}</span> &nbspProjects Completed</h6>
                            <hr>
                            <h5 style="font-size: 24px">Sign up to<br>
                                access high quality papers</h5>
                            <a href="{{route('register')}}" class="btn btn-primary hire mt-3 mb-4">Click to Sign Up</a>
                        </div>
                    </div>
                    <div class="card shadow-sm mt-3">
                        <div class="card-header">
                            <h5>Reviews</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="m-0"><span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                           </span>4.5/5 &nbsp;| &nbsp;Mikel</h6>
                            <p>I loved the work. It was high quality</p>
                            <h5>QW110-W | Writer: Jonah</h5>
                            <hr class="w-100">

                            <h6 class="m-0"><span><i class="fas fa-star">
                           </i><i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                           </span>4.5/5 &nbsp;| &nbsp;Mikel</h6>
                            <p>I loved the work. It was high quality</p>
                            <h5>QW110-W | Writer: Jonah</h5>
                            <hr class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---Beginning of Reviews-->


    <section class="feedback mt-5">
        <div class="container p-5">
            <h2 class="text-center mb-5">What clients say about Us</h2>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" ></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row m-5">
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>Client Feedback &nbsp;&nbsp;<span>
                     <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                    4.5/5

                      </span></h6>
                                <p>Excellent Work!</p>
                                <h6><span>Submitted 11hours ago</span></h6>

                            </div>
                            <div class="col-sm-11 col-md-2 col-lg-1 mx-auto">
                                <hr style="width: 1px; height: 100px">
                            </div>
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>Motion Graphics</h6>
                                <p>Coursework, ID. 293043</p>
                                <div class="d-inline-flex">
                                    <img src="images/tulah.png" class="img-fluid" align="Profile Photo" style="height: 50px">
                                    <p class="m-2">Witer: Tulah</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row m-5">
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>Client Feedback &nbsp;&nbsp;<span>
                     <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                    4.5/5

                </span></h6>
                                <p>Excellent Work!</p>
                                <h6><span>Submitted 11hours ago</span></h6>

                            </div>
                            <div class="col-sm-11 col-md-2 col-lg-1 mx-auto">
                                <hr style="width: 1px; height: 100px">
                            </div>
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>Motion Graphics</h6>
                                <p>Coursework, ID. 293043</p>
                                <div class="d-inline-flex">
                                    <img src="images/tulah.png" class="img-fluid" align="Profile Photo" style="height: 50px">
                                    <p class="m-2">Witer: Tulah</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row m-5">
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>Client Feedback &nbsp;&nbsp;<span>
                     <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="far fa-star"></i>
                    4.5/5

                </span></h6>
                                <p>Excellent Work!</p>
                                <h6><span>Submitted 11hours ago</span></h6>

                            </div>
                            <div class="col-sm-11 col-md-2 col-lg-1 mx-auto">
                                <hr style="width: 1px; height: 100px">
                            </div>
                            <div class="col-sm-11 col-md-5 col-lg-4 mx-auto">
                                <h6>Motion Graphics</h6>
                                <p>Coursework, ID. 293043</p>
                                <div class="d-inline-flex">
                                    <img src="images/tulah.png" class="img-fluid" align="Profile Photo" style="height: 50px">
                                    <p class="m-2">Witer: Tulah</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!--End of Body-->
@endsection
