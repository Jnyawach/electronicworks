@extends('layouts.manager_layout')
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

                <!--Writer application-->
                <div class="row mt-3">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Writers Application<span class="float-end fw-bold">Total:
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
                                                                   href="{{route('writer_application.show',$writer->id)
                                                                   }}">
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


    </script>
@endsection

