@extends('layouts.admin_layout')
@section('title', 'Roles')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                @include('includes.status')
                <section>
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header p-3">
                                    <h5 style="font-size: 18px" class="float-start">Roles </h5>
                                    <!-- Button trigger modal -->
                                    <button class="float-end bt-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Role</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('roles.store')}}" method="POST" id="roleForm">
                                                        @csrf
                                                        <div class="form-group required">
                                                           <label class="control-label" for="role">
                                                               Role Name:
                                                           </label>
                                                            <input type="text" class="form-control complete" name="role" required>

                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <label class="control-label" for="role">
                                                                Type/Guard Name
                                                            </label>
                                                            <select class="form-select" name="guard_name">
                                                                <option selected value="web">web</option>
                                                                <option value="admin">admin</option>
                                                            </select>
                                                        </div>
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" form="roleForm" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="role" class="display">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>TYPE</th>
                                            <th>CREATED ON</th>
                                            <th>ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{$role->id}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>{{$role->guard_name}}</td>
                                                <td>{{$role->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6" data-bs-toggle="dropdown"
                                                            aria-expanded="false" style="cursor: pointer">Action</h5>
                                                        <ul class="dropdown-menu" aria-labelledby="roleButton">
                                                            <li><a class="dropdown-item" href="{{route('roles.show',$role->id)}}">See details</a></li>
                                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$role->id}}">Edit</a>

                                                            </li>
                                                            <li>
                                                                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item text-danger">delete</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('roles.update',$role->id)}}" method="POST" id="roleEdit{{$role->id}}">
                                                                        @method('PATCH')
                                                                        @csrf
                                                                        <div class="form-group required">
                                                                            <label class="control-label" for="role">
                                                                                Role Name:
                                                                            </label>
                                                                            <input type="text" class="form-control complete" name="role"
                                                                                   required value="{{$role->name}}">

                                                                        </div>
                                                                        <div class="form-group mt-3">
                                                                            <label class="control-label" for="guard_name">
                                                                                Type/Guard Name
                                                                            </label>
                                                                            <select class="form-select" name="guard_name"id="guard_name">
                                                                                <option selected value="{{$role->guard_name}}">{{$role->guard_name}}</option>
                                                                                <option value="web">web</option>
                                                                                <option value="admin">admin</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" form="roleEdit{{$role->id}}">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>TYPE</th>
                                            <th>CREATED ON</th>
                                            <th>ACTION</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
@section('scripts')


    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#role').DataTable();
        } );


    </script>
@endsection
