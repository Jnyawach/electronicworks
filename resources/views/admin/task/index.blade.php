@extends('layouts.admin_layout')
@section('title', 'Projects')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">
            <div class="card">
                <div class="card-header">
                    <h5>Projects
                        <a href="{{route('task.create')}}" class="float-end text-decoration-none btn">Publish
                            Project</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table id="task" class="display">
                        <thead>
                        <tr>
                            <th>Project Id</th>
                            <th>Title</th>
                            <th>Writer Delivery</th>
                            <th>Deadline</th>
                            <th>Status/Writer</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($projects->count()>0)
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->writer_delivery}}</td>
                                    <td >{{$project->client_delivery}}</td>
                                    <td>{{$project->writer_id}}</td>
                                    <td>


                                    </td>



                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <th>Project Id</th>
                        <th>Title</th>
                        <th>Writer Delivery</th>
                        <th>Deadline</th>
                        <th>Status/Writer</th>
                        <th>Action </th>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#task').DataTable();
        } );

    </script>
@endsection
