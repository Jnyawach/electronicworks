@extends('layouts.manager_layout')
@section('title', 'Manager Panel')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <!--Header user-projects-invoices-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title ">Users</h5>
                                <h1 class="mb-0">3000</h1>
                                <h4 class="mt-0 fw-bold">Total Users</h4>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">2400</h5>
                                        <h4 class="mt-0 fw-normal">Writers</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">598</h5>
                                        <h4 class="mt-0 fw-normal">Clients</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">2</h5>
                                        <h4 class="mt-0 fw-normal">Admin</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title ">Projects</h5>
                                <h1 class="mb-0">100k</h1>
                                <h4 class="mt-0 fw-bold">Total projects</h4>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">98k</h5>
                                        <h4 class="mt-0 fw-normal">complete</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">2K</h5>
                                        <h4 class="mt-0 fw-normal">progress</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">1k</h5>
                                        <h4 class="mt-0 fw-normal">Bidding</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title ">Invoice</h5>
                                <h1 class="mb-0">$ 3000</h1>
                                <h4 class="mt-0 fw-bold">May, 2016</h4>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">$1820</h5>
                                        <h4 class="mt-0 fw-normal">Writers</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">$1100</h5>
                                        <h4 class="mt-0 fw-normal">Profit</h4>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                        <h5 class="mb-0 fw-bold">$60</h5>
                                        <h4 class="mt-0 fw-normal">Refund</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end ofHeader user-projects-invoices-->



            <div class="container ">
                <!--Delayed projects-->
                <div class="row mt-5">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Delayed submission<span class="float-end">12</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Impacts of Covid-19 on Businesses
                                        </td>
                                        <td>May 3, 2021 7:14am</td>
                                        <td><a href="#" class="text-decoration-none text-success">Alex</a> </td>
                                    </tr>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Impacts of Covid-19 on Businesses
                                        </td>
                                        <td>May 3, 2021 7:14am</td>
                                        <td><a href="#" class="text-decoration-none text-success">Alex</a> </td>
                                    </tr>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Delayed projects-->
                <!--beginning of notifications-->
                <hr>
                <h5>Notifications</h5>
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 style=" font-size: 18px">
                                    Writer application
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    You 3 new writer applications
                                </p>
                                <a href="#" class="btn btn-primary hire">View<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 style=" font-size: 18px">
                                    Client application
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    You 3 new writer applications
                                </p>
                                <a href="#" class="btn btn-primary hire">View<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 style=" font-size: 18px">
                                    Messages
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    You 3 new messages
                                </p>
                                <a href="#" class="btn btn-primary hire">View<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end of notifications-->

                <!--Revision projects-->

                <div class="row mt-5">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Revisions<span class="float-end">12</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id2" class="display">
                                    <thead>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Impacts of Covid-19 on Businesses
                                        </td>
                                        <td>May 3, 2021 7:14am</td>
                                        <td><a href="#" class="text-decoration-none text-success">Alex</a> </td>
                                    </tr>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Impacts of Covid-19 on Businesses
                                        </td>
                                        <td>May 3, 2021 7:14am</td>
                                        <td><a href="#" class="text-decoration-none text-success">Alex</a> </td>
                                    </tr>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End of Revision projects-->
                <!--completed projects-->
                <div class="row mt-5">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Submitted projects<span class="float-end">12</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id3" class="display">
                                    <thead>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Impacts of Covid-19 on Businesses
                                        </td>
                                        <td>May 3, 2021 7:14am</td>
                                        <td><a href="#" class="text-decoration-none text-success">Alex</a> </td>
                                    </tr>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Impacts of Covid-19 on Businesses
                                        </td>
                                        <td>May 3, 2021 7:14am</td>
                                        <td><a href="#" class="text-decoration-none text-success">Alex</a> </td>
                                    </tr>
                                    <tr>
                                        <th>Job Id</th>
                                        <th>Title</th>
                                        <th>Delivery time</th>
                                        <th>writer</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end completed projects-->

            </div>

        </div>
    </div>



@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id2').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id3').DataTable();
        } );
    </script>
@endsection
