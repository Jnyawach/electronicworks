@extends('layouts.client_layout')
@section('title','Dashboard')
@section('content')

        <!--page content-->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                    <!--In progress card-->
                    <div class="card  shadow-sm m-2">
                        <div class="card-header d-inline-flex">
                            <h5>In progress </h5>
                            <a href="#" class="ms-auto">see all&nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="card-body">
                            <a href="#" title="covid">
                                <div class="item ps-2 pt-2 pe-2">
                                    <div class="d-inline-flex w-100">
                                        <h5>Impacts of Covid-19 on Businesses</h5>
                                        <h4 class="ms-auto">ID No. 3002891</h4>
                                    </div>
                                    <p>Status:<span>Progress</span>&nbsp;|&nbsp;Words:<span>2000</span>
                                        &nbsp;|&nbsp;Deadline:<span>May 6,2021 7:40PM</span></p>
                                    <hr class="dropdown-divider">
                                </div>
                            </a>
                            <a href="#" title="covid">
                            <div class="item ps-2 pt-2 pe-2">
                                <div class="d-inline-flex w-100">
                                    <h5>Impacts of Covid-19 on Businesses</h5>
                                    <h4 class="ms-auto">ID No. 3002891</h4>
                                </div>
                                <p>Status:<span>Progress</span>&nbsp;|&nbsp;Words:<span>2000</span>
                                    &nbsp;|&nbsp;Deadline:<span>May 6,2021 7:40PM</span></p>
                                <hr class="dropdown-divider">
                            </div>
                            </a>
                            <a href="#" title="covid">
                            <div class="item ps-2 pt-2 pe-2">
                                <div class="d-inline-flex w-100">
                                    <h5>Impacts of Covid-19 on Businesses</h5>
                                    <h4 class="ms-auto">ID No. 3002891</h4>
                                </div>
                                <p>Status:<span>Progress</span>&nbsp;|&nbsp;Words:<span>2000</span>
                                    &nbsp;|&nbsp;Deadline:<span>May 6,2021 7:40PM</span></p>
                                <hr class="dropdown-divider">
                            </div>
                            </a>


                        </div>
                    </div>
                    <!--End of progress card-->
                    <!--submission card-->
                    <div class="card  shadow-sm m-2">
                        <div class="card-header d-inline-flex">
                            <h5>Submissions</h5>
                            <a href="#" class="ms-auto">see all&nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="card-body">
                            <a href="#" title="covid">
                                <div class="item ps-2 pt-2 pe-2">
                                    <div class="d-inline-flex w-100">
                                        <h5>Impacts of Covid-19 on Businesses</h5>
                                        <h4 class="ms-auto">ID No. 3002891</h4>
                                    </div>
                                    <p>Status:&nbsp;<span>2hrs ago</span></p>
                                    <hr class="dropdown-divider">
                                </div>
                            </a>
                            <a href="#" title="covid">
                            <div class="item ps-2 pt-2 pe-2">
                                <div class="d-inline-flex w-100">
                                    <h5>Impacts of Covid-19 on Businesses</h5>
                                    <h4 class="ms-auto">ID No. 3002891</h4>
                                </div>
                                <p>Status:&nbsp;<span>2hrs ago</span></p>
                                <hr class="dropdown-divider">
                            </div>
                            </a>
                            <a href="#" title="covid">
                            <div class="item ps-2 pt-2 pe-2">
                                <div class="d-inline-flex w-100">
                                    <h5>Impacts of Covid-19 on Businesses</h5>
                                    <h4 class="ms-auto">ID No. 3002891</h4>
                                </div>
                                <p>Status:&nbsp;<span>2hrs ago</span></p>
                                <hr class="dropdown-divider">
                            </div>
                            </a>


                        </div>
                    </div>
                    <!--end of submission card-->
                    <!--revisions card-->
                    <div class="card  shadow-sm m-2">
                        <div class="card-header d-inline-flex">
                            <h5>Revisions</h5>
                            <a href="#" class="ms-auto">see all&nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="card-body">
                            <a href="#" title="covid">
                                <div class="item ps-2 pt-2 pe-2">
                                    <div class="d-inline-flex w-100">
                                        <h5>Impacts of Covid-19 on Businesses</h5>
                                        <h4 class="ms-auto">ID No. 3002891</h4>
                                    </div>
                                    <p>Status:&nbsp;<span>2hrs ago</span></p>
                                    <hr class="dropdown-divider">
                                </div>
                            </a>
                            <a href="#" title="covid">
                            <div class="item ps-2 pt-2 pe-2">
                                <div class="d-inline-flex w-100">
                                    <h5>Impacts of Covid-19 on Businesses</h5>
                                    <h4 class="ms-auto">ID No. 3002891</h4>
                                </div>
                                <p>Status:&nbsp;<span>2hrs ago</span></p>
                                <hr class="dropdown-divider">
                            </div>
                            </a>
                            <a href="#" title="covid">
                            <div class="item ps-2 pt-2 pe-2">
                                <div class="d-inline-flex w-100">
                                    <h5>Impacts of Covid-19 on Businesses</h5>
                                    <h4 class="ms-auto">ID No. 3002891</h4>
                                </div>
                                <p>Status:&nbsp;<span>2hrs ago</span></p>
                                <hr class="dropdown-divider">
                            </div>
                            </a>


                        </div>
                    </div>
                    <!-- end of revisions-->

                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                    <!--notifications card-->
                    <div class="card m-2 shadow-sm notification">
                        <div class="card-header">
                            <h5>Notifications</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Updated terms & conditions</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="">Read all<i class="fas fa-long-arrow-alt-right ms-2"></i></a>
                                <hr>
                            </div>
                            <div>
                                <h5 class="card-title">Message <span class="badge bg-danger">New</span></h5>
                                <p class="card-tex">Please ensure your invoices are
                                    consistent and match the one’s
                                    in the system</p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--expenditure card-->

            <div class="row mb-5">
                <div class="col-12 mx-auto">
                    <div class="card shadow-sm expenditure">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-lg-5 p-5">
                                    <div>
                                        <h5>Orders</h5>
                                        <h4>May, 2021</h4>
                                    </div>
                                    <div class="mt-5">
                                        <h1>$ 4000.56</h1>
                                        <h4>Total Expenditure</h4>
                                    </div>
                                    <div class="mt-5">
                                        <h1>80</h1>
                                        <h4>Total Orders</h4>
                                    </div>


                                </div>
                                <div class="col-sm-12 col-md-7 col-lg-7 p-3">
                                    <h5>FEBRUARY</h5>
                                    <div>
                                        <canvas id="myChart" width="400" height="250"></canvas>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4 mx-auto">
                                    <h1>$ 4000.56</h1>
                                    <h4>Cleared invoices</h4>
                                </div>
                                <div class="col-4 mx-auto">
                                    <h1>$ 403.00</h1>
                                    <h4>Pending invoices</h4>
                                </div>
                                <div class="col-4 mx-auto">
                                    <h1>$ 600.00</h1>
                                    <h4>Refunded invoices</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3', '4', '5', '6'],
                datasets: [{
                    label: '# of Votes',
                    data: [6, 10, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection


