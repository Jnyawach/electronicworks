@extends('layouts.admin_layout')
@section('title','Invoice')
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container ">
    <!-- Page Content  -->
    <div id="content" class="">

        <!--page content-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="fs-4 fw-bold">$. 6000</h4>
                            <h5 class="fs-5">DUE AND UNPAID</h5>

                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="fs-4 fw-bold">$. 1200</h4>
                            <h5 class="fs-5">OPEN STATEMENT</h5>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="fs-4 fw-bold">$. 73400</h4>
                            <h5 class="fs-5">TOTAL PAID</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 mx-auto">
                    <div class="card invoice shadow-sm">
                        <div class="card-header w-100">
                            <nav class="nav w-100">
                                <a class="nav-link active" href="#">All</a>
                                <a class="nav-link text-warning" href="#">Open</a>
                                <a class="nav-link text-primary" href="#">Paid</a>
                                <a class="nav-link text-danger" href="#">Unpaid</a>
                                <a class="nav-link float-end disabled fw-bold" href="#">May, 2016</a>

                            </nav>
                        </div>
                        <div class="card-body overflow-scroll">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <h5 CLASS="ps-3">INVOICE NUMBER</h5>
                                    <ul class="nav flex-column ps-3">
                                        @foreach($invoices as$invoice)
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#"><h4
                                                    class="mb-0">{{$invoice->number}}</h4>
                                                <h5 class="pt-0 mt-0 text-uppercase">{{$invoice->created_at->isoFormat('MMM Y')
                                                }}</h5>
                                            </a>

                                        </li>
                                            @endforeach

                                    </ul>
                                </div>
                                <div class="col-sm-12 col-md-8 col-lg-8">
                                    <table class="table">
                                        <thead>
                                        <tr>

                                            <th scope="col"><h5>ORDER NO.</h5></th>
                                            <th scope="col" class="text-end"><h5>USER AMOUNT (Kshs.)</h5></th>
                                            <th scope="col" class="text-end"><h5>CLIENT AMOUNT ($)</h5></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td>#85886</td>
                                            <td class="text-end">6800.00</td>
                                            <td class="text-end">6800.00</td>

                                        </tr>
                                        <tr>

                                            <td>#85886</td>
                                            <td class="text-end">400.00</td>
                                            <td class="text-end">6800.00</td>

                                        </tr>
                                        <tr>

                                            <td>#85886</td>
                                            <td class="text-end">400.00</td>
                                            <td class="text-end">6800.00</td>

                                        </tr>
                                        <tr>

                                            <td>#85886</td>
                                            <td class="text-end">400.00</td>
                                            <td class="text-end">6800.00</td>

                                        </tr>

                                        </tbody>
                                    </table>

                                    <hr class="dotted mt-5">
                                    <h5>REFUND</h5>
                                    <table class="table mt-5">
                                        <tbody>
                                        <tr>
                                            <td>#85886</td>
                                            <td class="text-end">400.00</td>
                                            <td class="text-end">6800.00</td>

                                        </tr>
                                        <tr>

                                            <td>#85886</td>
                                            <td class="text-end">400.00</td>
                                            <td class="text-end">6800.00</td>
                                        </tr>
                                        <tr class="total mt-5">

                                            <td><h5>TOTAL</h5></td>
                                            <td class="text-end"><h5>16000.00</h5></td>
                                            <td class="text-end">6800.00</td>

                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end of page content-->
            </div>
        </div>
    </div>
@endsection
