@extends('layouts.client_layout')
@section('title', 'Create Project')
@section('content')
    @include('includes.ckeditor')

            <div class="container pt-2 pl-3 dashboard">
                <div class="row">
                    <div class="col-sm-12 mx-auto">
                        <!--In progress card-->
                        <div class="card  shadow-sm mb-5 projects">
                            <div class="card-header">
                                <h5>Add order to your details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="mt-5" enctype="multipart/form-data" action="{{route('jobs.store')
                                        }}" method="POST">
                                            @csrf
                                            <div class="form-group required">
                                                <label for="title" class="control-label">Title:</label><br>
                                                <input type="text" value="{{old('text')}}" required class="complete"
                                                       style="width: 600px" name="title">
                                                <small class="text-danger">
                                                    @error('title')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <div class="form-group required mt-4 row">
                                                <div class="col-sm-12 col-md-6 col-6">
                                                    <label for="writing-style" class="control-label">Format or Citation styles:</label>
                                                    <select class="form-select" style="width: 400px" id="writing-style"
                                                            name="citation_id" required>
                                                        <option value="" selected>Choose formatting style</option>
                                                        @foreach($citation as $id=>$cite)
                                                            <option value="{{$id}}">{{$cite}}</option>
                                                        @endforeach

                                                    </select>
                                                    <small class="text-danger">
                                                        @error('citation_id')
                                                        {{ $message }}
                                                        @enderror
                                                    </small>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-6">
                                                    <label for="category" class="control-label">Field or Category:</label>
                                                    <select class="form-select" style="width: 400px" id="category"
                                                            name="descipline_id">
                                                        <option selected>Choose category</option>
                                                        @foreach($field as $id=>$fed)
                                                            <option value="{{$id}}">{{$fed}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-danger">
                                                        @error('descipline_id')
                                                        {{ $message }}
                                                        @enderror
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="form-group required mt-4">
                                                <label for="sku" class="control-label">Project SKU:</label><br>
                                                <input type="text" id="sku" name="sku"
                                                       class="complete control-input" value="{{old('sku')}}" required
                                                       style="width: 600px" ><br>
                                                <small class="text-danger">
                                                    @error('sku')
                                                    {{ $message }}
                                                    @enderror
                                                </small><br>
                                                <small>Please provide a unique project sku e.g QW110-F</small>

                                            </div>
                                            <div class="form-group required mt-4">
                                                <label for="instructions" class="control-label">Paper instructions:</label>
                                                <textarea class="form-control complete" id="instructions"
                                                          style="height: 300px" name="instruction">
                                                    {{old('instruction')}}
                                                </textarea>
                                                <small class="text-danger">
                                                    @error('instruction')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                                <small>This may include: paper structure and or outline,
                                                    types
                                                    and number  references to be included, grading scale,
                                                    academic level, number of word and any other requirements</small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="materials" class="form-label">Upload additional
                                                    materials:</label>
                                                <input class="form-control form-control-lg" id="materials"
                                                       type="file" style="width: 400px" name="materials">
                                                <small class="text-danger">
                                                    @error('materials')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                                <small>Please zip the multiple files before upload.
                                                    Total file size should not exceed 10MB</small>

                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="writer" class="control-label">Request for a
                                                    specific writer:</label>
                                                <select class="form-select" style="width: 400px" id="writer"
                                                        name="writer_id">
                                                    <option selected value="0">Choose writer</option>

                                                    @foreach($writer as $id=>$free)
                                                        <option value="{{$id}}">{{$free}}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">
                                                    @error('writer_id')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                                <small>The writers will submit a proposal.
                                                    If you want a specific writer for the project please select the
                                                    writer. This project will automatically assigned to the writer.
                                                    <a href="#" class="text-success">See writer rating & reviews</a>
                                                </small>

                                            </div>

                                            <div class="form-group required mt-4">
                                                <label for="deadline"  class="control-label">Delivery (in Hours)
                                                    :</label><br>
                                                <input type="number" id="deadline" name="deadline"
                                                       class="complete" value="{{old('deadline')}}" required
                                                       min="1"><br>
                                                <small class="text-danger">
                                                    @error('deadline')
                                                    {{ $message }}
                                                    @enderror
                                                </small>
                                                <small>Please provide the deadline in hours from now. For
                                                    instance 5hrs from now</small>
                                            </div>

                                            <div class="form-group required mt-4 row">
                                                <div class="col-6">
                                                    <label for="word"  class="control-label">Words
                                                        :</label><br>
                                                    <input type="text" id="word" name="words"
                                                           class="complete" value="{{old('words')}}" required><br>
                                                    <small class="text-danger">
                                                        @error('words')
                                                        {{ $message }}
                                                        @enderror
                                                    </small>
                                                    <small>Please provide number of words for the task</small>
                                                </div>
                                                <div class="col-6">
                                                    <label for="payment"  class="control-label">Payment
                                                        :</label><br>
                                                    <input type="number" id="payment"  class="complete" min="5"
                                                           step="any" max="25" name="cost" value="{{old('cost')}}"
                                                           required><br>
                                                    <small class="text-danger">
                                                        @error('cost')
                                                        {{ $message }}
                                                        @enderror
                                                    </small>
                                                    <small>Please provide payment per page in dollars<br>
                                                        A minimum of $5 per page
                                                    </small>
                                                </div>

                                            </div>



                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Save & publish for writers
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>


                            </div>

                        </div>
                        <!--End of progress card-->

                    </div>


                </div>
            </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'instructions', );
    </script>
@endsection


