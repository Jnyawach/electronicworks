@extends('layouts.client_layout')
@section('title','Assign Writer')
@section('content')
<section>
    <h5>Select Writers for this Project({{$project->id}})</h5>
    <hr class="dropdown-divider">
    <form class="mt-5">
        @if($recentWriters->count()>0)
            <h5 class="fw-bold">Recent Writers</h5>
        <div class="form-group row">
            @foreach($recentWriters as $recent)

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$recent->writer_id}}" id="recent{{$recent->writer_id}}"
                    name="writer">
                    <label class="form-check-label" for="recent{{$recent->writer_id}}">
                        <div class="">
                            <img src="">
                            <h4>{{$recent->writers->name}}</h4>
                        </div>
                    </label>
                </div>

            </div>
            @endforeach
        </div>
            @endif
        <hr class="dotted">
    </form>

</section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#searchbar").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#wrote #writers").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    @endsection
