@extends('layouts.admin_layout')
@section('title', 'Users')
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
                                    <h4 class="fs-4 fw-bold">{{$admins->count()}}</h4>
                                    <h5 class="fs-5">ADMIN</h5>

                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                        <div class="card shadow-sm">
                            <a href="#" class="text-decoration-none">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">58</h4>
                                    <h5 class="fs-5">CLIENT</h5>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
                        <div class="card shadow-sm">
                            <a href="#" class="text-decoration-none">
                                <div class="card-body p-4">
                                    <h4 class="fs-4 fw-bold">1580</h4>
                                    <h5 class="fs-5">WRITERS</h5>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Delayed projects-->
                <div class="row mt-3">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Users<span class="float-end fw-bold">Total: 4152</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id" class="display">
                                    <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Registration date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>View </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Allan</td>
                                        <td>May 3, 2021</td>
                                        <td>Writer</td>
                                        <td class="text-danger">Deactivated</td>
                                        <td><a href="#" class="text-decoration-none text-success">View profile</a> </td>
                                    </tr>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Allan</td>
                                        <td>May 3, 2021 </td>
                                        <td>Writer</td>
                                        <td>Active</td>
                                        <td><a href="#" class="text-decoration-none text-success">View profile</a> </td>
                                    </tr>
                                    <tfoot>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Registration date</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>View </th>
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Delayed projects-->

                <div class="row mt-3">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Low
                                    rating users<span class="float-end fw-bold">Total: 4</span></h5>
                            </div>
                            <div class="card-body">
                                <table id="table_id2" class="display">
                                    <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Registration date</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>View </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Allan</td>
                                        <td>May 3, 2021</td>
                                        <td>1.2</td>
                                        <td class="text-danger">Deactivated</td>
                                        <td><a href="#" class="text-decoration-none text-success">View profile</a> </td>
                                    </tr>
                                    <tr>
                                        <td>2347654</td>
                                        <td>Allan</td>
                                        <td>May 3, 2021 </td>
                                        <td>1.8</td>
                                        <td>Active</td>
                                        <td><a href="#" class="text-decoration-none text-success">View profile</a> </td>
                                    </tr>
                                    <tfoot>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Registration date</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>View </th>
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!--Admin Users-->
                    <div class="row mt-3">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header p-3">
                                    <h5 style="font-size: 18px">Admins<span class="float-end fw-bold">Total:
                                            {{$admins->count()}}</span></h5>
                                </div>
                                <div class="card-body">
                                    <table id="table_id3" class="display">
                                        <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            <th>Registration date</th>
                                            <th>Status</th>
                                            <th>Account</th>
                                            <th>Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($admins->count()>0)
                                            @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->id}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->created_at->isoFormat('MMM Do Y')}}</td>
                                            <td class="text-success">online</td>
                                            <td class="text-danger">{{$admin->status->name}}</td>
                                            <td>
                                                <!---remember to use auth for super admin-->
                                                <div class="dropdown">
                                                    <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                            id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        See action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="message1">
                                                        <li><a class="dropdown-item" href="{{route('user.show',
                                                        $admin->id)}}">View <i
                                                                    class="fas fa-external-link-square-alt
                                                                    ms-2"></i></a></li>
                                                        <li><a class="dropdown-item" href="{{route('user.edit',
                                                        $admin->id)}}">Edit <i
                                                                    class="fas fa-bookmark ms-2"></i></a></li>
                                                        <li>
                                                            @if($admin->status->name=='Disabled')
                                                                <form method="POST" action="{{route('disable',
                                                            $admin->id)}}">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <input type="hidden" name="status_id"
                                                                           value="1">
                                                                    <button type="submit" class="btn">Enable <i
                                                                            class="fas fa-check-square ms-2"></i></button>
                                                                </form>
                                                            @else
                                                                <form method="POST" action="{{route('disable',
                                                            $admin->id)}}">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <input type="hidden" name="status_id"
                                                                           value="4">
                                                                    <button type="submit" class="btn">Disable <i
                                                                            class="fas fa-check-square ms-2"></i></button>
                                                                </form>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <form method="POST" action="{{route('user.destroy',
                                                            $admin->id)}}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" name="user_id"
                                                                       value="{{$admin->id}}">
                                                                <button type="submit" class="btn text-danger">Delete <i
                                                                        class="far fa-trash-alt ms-2"></i></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </td>



                                        </tr>
                                        @endforeach
                                        @endif

                                        <tfoot>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Registration date</th>
                                        <th>Status</th>
                                        <th>Account</th>
                                        <th>Action </th>
                                        </tfoot>
                                        </tbody>
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
        <div class="footer bg-light p-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        Copyright © 2021 Electronic Works</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
