@extends('layouts.admin_layout')
@section('title', 'Applications')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">

            <div class="container ">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                        <div class="card shadow-sm">
                            <a href="#" class="text-decoration-none">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">{{$writers->count()+$clients->count()}}</h4>
                                    <h5 class="fs-5">TOTAL APPLICATIONS</h5>

                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                        <div class="card shadow-sm">
                            <a href="#" class="text-decoration-none">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">{{$writers->count()}}</h4>
                                    <h5 class="fs-5">WRITER APPLICATIONS</h5>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                        <div class="card shadow-sm">
                            <a href="#" class="text-decoration-none">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">{{$clients->count()}}</h4>
                                    <h5 class="fs-5">WRITER APPLICATIONS</h5>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Writer application-->
                <div class="row mt-3">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Writers<span class="float-end fw-bold">Total:
                                            {{$writers->count()}}</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id4" class="display">
                                    <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Registration date</th>
                                        <th>Account</th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($writers->count()>0)
                                        @foreach($writers as $writer)
                                            <tr>
                                                <td>{{$writer->id}}</td>
                                                <td>{{$writer->name}}</td>
                                                <td>{{$writer->created_at->isoFormat('MMM Do Y')}}</td>
                                                <td class="text-success">online</td>
                                                <td>
                                                    <!---remember to use auth for super admin-->
                                                    <div class="dropdown">
                                                        <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                                id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            See action
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="message1">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{route('application.show',$writer->id)}}">
                                                                    View <i class="fas fa-external-link-square-alt
                                                                   ms-2"></i></a></li>
                                                            <li>

                                                            <li>
                                                                <form method="POST" action="{{route('writer.update',
                                                            $writer->id)}}">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                           value="{{$writer->id}}">
                                                                    <button type="submit" class="btn
                                                                    text-danger">Reject <i
                                                                            class="far fa-trash-alt ms-2"></i></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </td>



                                            </tr>

                                    @endforeach

                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Registration date</th>
                                    <th>Account</th>
                                    <th>Action </th>
                                    </tfoot>

                                </table>
                            </div>

                        </div>

                    </div>
                    <!--clients table--->

                    <div class="col-12 mx-auto mt-3">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Clients<span class="float-end fw-bold">Total:
                                            {{$clients->count()}}</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id3" class="display">
                                    <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Registration date</th>
                                        <th>Account</th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($clients->count()>0)
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->id}}</td>
                                                <td>{{$client->name}}</td>
                                                <td>{{$client->created_at->isoFormat('MMM Do Y')}}</td>
                                                <td class="text-success">online</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                                id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            See action
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="message1">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{route('application.show',$client->id)}}">
                                                                    View <i class="fas fa-external-link-square-alt
                                                                   ms-2"></i></a></li>
                                                            <li>

                                                            <li>
                                                                <form method="POST" action="{{route('writer.update',
                                                            $client->id)}}">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                           value="{{$client->id}}">
                                                                    <button type="submit" class="btn
                                                                    text-danger">Reject <i
                                                                            class="far fa-trash-alt ms-2"></i></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </td>



                                            </tr>

                                        @endforeach

                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Registration date</th>
                                    <th>Account</th>
                                    <th>Action </th>
                                    </tfoot>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>


        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#table_id4').DataTable();
        } );
        $(document).ready( function () {
            $('#table_id3').DataTable();
        } );

    </script>
@endsection
