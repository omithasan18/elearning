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
                            <li class="breadcrumb-item active">Create Question</li>
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
                                <h3>Create Question</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.question.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Course <span class="text-danger">*</span></label>
                                                <select name="course_id" class="form-control">
                                                    <option value="" disabled>Select Category</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="" disabled>Select One</option>
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Answer <span class="text-danger">*</span></label>
                                                <select name="answer" class="form-control">
                                                    <option value="" selected disabled>Select One</option>
                                                    <option value="option_one">Option 1</option>
                                                    <option value="option_two">Option 2</option>
                                                    <option value="option_three">Option 3</option>
                                                    <option value="option_four">Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-right">Mark <span class="text-danger">*</span></label>
                                                <input type="number" name="mark" class="form-control" value="1" placeholder="Mark">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-right">Question <span class="text-danger">*</span></label>
                                                <textarea name="question" class="form-control"  cols="30" rows="4" placeholder="Question"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 1 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_one" placeholder="Option One" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 2 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_two" placeholder="Option Two" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 3 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_three" placeholder="Option Three" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label class="col-md-1">Option 3 <span class="text-danger">*</span></label>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="option_four" placeholder="Option For" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success">Create Question</button>
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