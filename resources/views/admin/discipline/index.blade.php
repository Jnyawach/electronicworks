@extends('layouts.admin_layout')
@section('title','Add Fields')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                @include('includes.status')
                <div class="row mt-5">
                    <div class="col-12 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header p-3">
                                <h5 style="font-size: 18px">Disciplines<span class="float-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Add Fields
                                </button>
                                    </span></h5>
                            </div>
                            <div class="card-body">
                                <!---CreateModal-->
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Field</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('discipline.store')}}" method="POST" id="field">
                                                    @csrf
                                                    <div class="form-group">
                                                        <select class="form-select complete" name="status" required id="status">
                                                            <option value="1" selected>Visible</option>
                                                            <option value="0" >Hidden</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" class="form-control complete" name="name"
                                                               required placeholder="Add Field Name " value="{{old
                                                               ('name')}}">
                                                        <small class="text-danger">
                                                            @error('name')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="number" class="form-control complete" name="price"
                                                               required placeholder="Add Price/Cost ($)" value="{{old
                                                               ('price')}}">
                                                        <small class="text-danger">
                                                            @error('price')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" form="field">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end of create Modal-->
                                <table id="table_id1" class="display">
                                    <thead>
                                    <tr>
                                        <th>Field Id</th>
                                        <th>Name</th>
                                        <th>Cost/Pricing($)</th>
                                        <th>Status</th>
                                        <th >Action</th>
                                        <th ></th>
                                    </tr>
                                    </thead>
                                    @if(isset($fields))
                                    <tbody>
                                    @foreach($fields as $field)
                                    <tr class="unread">
                                        <td>{{$field->id}}</td>
                                        <td>{{$field->name}}</td>
                                        <td>{{$field->price}}</td>
                                        <td>
                                            @if($field->status==1)
                                                Visible
                                                @else
                                                Hidden
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit{{$field->id}}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="edit{{$field->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('discipline.update',$field->id)}}"
                                                                  method="POST" id="field-update">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="form-group">
                                                                    <select class="form-select complete" name="status" required id="status">
                                                                        <option value="1" selected>Visible</option>
                                                                        <option value="0" >Hidden</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <input type="text" class="form-control complete" name="name"
                                                                           required placeholder="Add Field Name"
                                                                           value="{{$field->name}}">
                                                                    <small class="text-danger">
                                                                        @error('name')
                                                                        {{ $message }}
                                                                        @enderror
                                                                    </small>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <input type="number" class="form-control complete" name="price"
                                                                           required placeholder="Add Price/Cost ($)"
                                                                           value="{{$field->price}}">
                                                                    <small class="text-danger">
                                                                        @error('price')
                                                                        {{ $message }}
                                                                        @enderror
                                                                    </small>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"
                                                                    form="field-update">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{route('discipline.destroy', $field->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn-sm btn-primary"><i class="far
                                                fa-trash-alt"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                        @endif
                                    <tfoot>
                                    <tr>
                                        <th>Field Id</th>
                                        <th>Name</th>
                                        <th>Cost/Pricing($)</th>
                                        <th>Status</th>
                                        <th >Action</th>
                                        <th>

                                        </th>
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
            $('#table_id1').DataTable();
        } );


    </script>
@endsection
