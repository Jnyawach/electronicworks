@extends('layouts.manager_layout')
@section('title','Assign Writer')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="dashboard-wrapper green-body pt-5 pb-5">
        <div class="container">
            <div class="container pt-5 pl-3 dashboard">
    <section>
        <div >
            <h5 class="fw-bold mb-3">Select a Writer to assign-({{$project->sku}})
                <a href="{{route('work.index')}}" class="btn-sm btn-primary hire text-decoration-none  float-end">SKIP & LET WRITERS SUBMIT BID</a>
            </h5>

        </div>
    </section>
    <section>

        <hr class="dropdown-divider">
        @if($writers->count()>0)
            <h5 class="fw-bold mt-3">Available Writers</h5>
            <div class="card">
                <div class="card-body">
                    <table id="select-writer" class="display">
                        <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Projects Completed</th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($writers->count()>0)
                            @foreach($writers as $writer)
                                <tr>
                                    <td>
                                        <img src="{{url($writer->getFirstMedia('avatar')? $writer->getFirstMedia('avatar')
                                   ->getUrl('avatar_card'):'/images/no-image.png' )}}" class="img-fluid " style="height: 40px;">
                                    </td>
                                    <td>{{$writer->name}}</td>
                                    <td>
                                        @if($writer->reviewing->count()>0)
                                            <h4> @for($i = 0; $i < 5; $i++)
                                                    <i class="fa{{ $writer->reviewing->sum('stars')/$writer->reviewing->count()  <= $i ? 'r' : '' }} fa-star"></i>

                                                @endfor
                                            </h4>
                                        @else
                                            <h4>No Reviews</h4>
                                        @endif
                                    </td>
                                    <td class="text-success fw-bold">{{$writer->jobs?$writer->jobs->count():'0'}}</td>
                                    <td>
                                        @if($writer->isOnline())
                                            <span class="text-success">online</span>
                                        @else
                                            last seen {{\Carbon\Carbon::parse($writer->last_seen)->diffForHumans()}}
                                    @endif

                                    <td>
                                        <form id="{{$writer->id}}" action="{{route('manager-writer',$project->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" value="{{$writer->id}}" name="writer">
                                            <button type="submit" class="btn-sm btn-primary p- m-0">ASSIGN</button>
                                        </form>
                                    </td>



                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Projects Completed</th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        @endif
    </section>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#select-writer').DataTable();
        } );

    </script>
@endsection

