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
                                    <h5 style="font-size: 18px" class="float-start">Permissions</h5>
                                    <!-- Button trigger modal -->
                                    <button class="float-end bt-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Permission</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Permission</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('permission.store')}}" method="POST" id="roleForm">
                                                        @csrf
                                                        <div class="form-group required">
                                                            <label class="control-label" for="permission">
                                                                Permission Name:
                                                            </label>
                                                            <input type="text" class="form-control complete" name="permission" required>

                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <label class="control-label" for="guard_name">
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
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{$permission->id}}</td>
                                                <td>{{$permission->name}}</td>
                                                <td>{{$permission->guard_name}}</td>
                                                <td>{{$permission->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6" data-bs-toggle="dropdown"
                                                            aria-expanded="false" style="cursor: pointer">Action</h5>
                                                        <ul class="dropdown-menu" aria-labelledby="roleButton">
                                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$permission->id}}">Edit</a>

                                                            </li>
                                                            <li>
                                                                <form action="{{route('permission.destroy',$permission->id)}}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item text-danger">delete</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{$permission->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Permission</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('permission.update',$permission->id)}}" method="POST" id="roleEdit{{$permission->id}}">
                                                                        @method('PATCH')
                                                                        @csrf
                                                                        <div class="form-group required">
                                                                            <label class="control-label" for="role">
                                                                                Role Name:
                                                                            </label>
                                                                            <input type="text" class="form-control complete" name="permission"
                                                                                   required value="{{$permission->name}}">

                                                                        </div>
                                                                        <div class="form-group mt-3">
                                                                            <label class="control-label" for="guard_name">
                                                                                Type/Guard Name
                                                                            </label>
                                                                            <select class="form-select" name="guard_name"id="guard_name">
                                                                                <option selected value="{{$permission->guard_name}}">{{$permission->guard_name}}</option>
                                                                                <option value="web">web</option>
                                                                                <option value="admin">admin</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" form="roleEdit{{$permission->id}}">Save changes</button>
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

