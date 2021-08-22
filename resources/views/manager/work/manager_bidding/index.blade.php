@extends('layouts.manager_layout')
@section('title', 'Projects')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')

    <div class="dashboard-wrapper green-body pt-5">
        <div class="container p-5">
            @include('includes.status')
            <div class="card">
                <div class="card-header">
                    <h5>Projects under Bidding</h5>
                </div>
                <div class="card-body">
                    <table id="task" class="display">
                        <thead>
                        <tr>
                            <th>Project Id</th>
                            <th>SKU</th>
                            <th>Writer Delivery</th>
                            <th>Deadline</th>
                            <th>Writer</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($projects->count()>0)
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->sku}}</td>
                                    <td>{{\Carbon\Carbon::parse($project->writer_delivery)->diffForHumans()}}</td>
                                    <td >{{\Carbon\Carbon::parse($project->client_delivery)->diffForHumans()}}</td>
                                    <td>
                                        {{$project->progress->name}}
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <a class="btn dropdown-toggle p-0 m-0" href="#" role="button"
                                               id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a href="{{route('manager_bidding.show', $project->slug)}}"
                                                       class="dropdown-item">View</a>
                                                </li>
                                                <li>
                                                <li>
                                                    <form class="ms-auto" action="{{route('manager-cancelled.update',$project->id)}}"
                                                          method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <input type="hidden" name="progress" value="9">
                                                        <button type="submit" class="btn dropdown-item">Cancel</button>
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
                        <th>Project Id</th>
                        <th>SKU</th>
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




