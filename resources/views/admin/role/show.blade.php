@extends('layouts.admin_layout')
@section('title',$role->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                @include('includes.status')
                <h5>Role Name: {{$role->name}}</h5>
                <hr class="dropdown-divider">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 style="font-size: 18px">Permissions</h5>
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
                                                @if($role->hasPermissionTo($permission->name))
                                                    <form action="{{route('revokePermission',$permission->id)}}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <input type="hidden" name="role" value="{{$role->id}}">
                                                        <button type="submit" class="btn-sm btn-danger">Revoke Permission</button>
                                                    </form>
                                                    @else
                                                    <form  method="POST" action="{{route('assignPermission',$permission->id)}}">
                                                        @method('PATCH')
                                                        @csrf
                                                        <input type="hidden" name="role" value="{{$role->id}}">
                                                        <button type="submit" class="btn-sm btn-primary">Assign Permission</button>
                                                    </form>
                                                    @endif
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
