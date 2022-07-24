@extends('admin.layouts.app')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Question</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Question</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.question.update', $question->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Course <span class="text-danger">*</span></label>
                                                <select name="course_id" class="form-control">
                                                    <option value="" disabled>Select Category</option>
                                                    @foreach($courses as $course)
                                                        <option @if($course->id == $question->course_id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="" disabled>Select One</option>
                                                    <option @if($question->status == 1) selected @endif value="1">Active</option>
                                                    <option @if($question->status == 0) selected @endif value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Answer <span class="text-danger">*</span></label>
                                                <select name="answer" class="form-control">
                                                    <option value="" selected disabled>Select One</option>
                                                    <option @if($question->answer == "option_one") selected @endif value="option_one">Option 1</option>
                                                    <option @if($question->answer == "option_two") selected @endif value="option_two">Option 2</option>
                                                    <option @if($question->answer == "option_three") selected @endif value="option_three">Option 3</option>
                                                    <option @if($question->answer == "option_four") selected @endif value="option_four">Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Mark <span class="text-danger">*</span></label>
                                                <input type="number" name="mark" class="form-control" value="{{ $question->mark }}" placeholder="Mark">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-right">Question <span class="text-danger">*</span></label>
                                                <textarea name="question" class="form-control"  cols="30" rows="4" placeholder="Question">{{ $question->question }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 1 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_one" value="{{ $question->option_one }}" placeholder="Option One" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 2 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_two" value="{{ $question->option_two }}" placeholder="Option Two" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 3 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_three" value="{{ $question->option_three }}" placeholder="Option Three" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 3 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_four" value="{{ $question->option_four }}" placeholder="Option For" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success">Update Question</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('script')

@endsection