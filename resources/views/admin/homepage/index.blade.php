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
                            <li class="breadcrumb-item active">Home Page Setting</li>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-2">
                                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">
                                                Welcome Section
                                            </a>
                                            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">
                                                YouTube Section
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-7 col-sm-10">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                                <form action="{{ route('admin.homepagesetting.update',$welcometitle->id)}}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-right"> Welcome Title <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" placeholder="Welcome Title" value="{{$welcometitle->name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-right">Image <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" onChange="getImage(this)" name="image" class="custom-file-input">
                                                                        <label class="custom-file-label">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <img width="80" height="80" src="@if($welcometitle->image) {{asset($welcometitle->image)}} @else {{ asset('demomedia/demo.jpg') }}@endif" id="loadImage">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-right">Description<span class="text-danger">*</span></label>
                                                                <textarea class="form-control" onkeyup="countChars(this);" name="details" placeholder="Description">{{$welcometitle->details}}</textarea>
                                                            </div>
                                                            <p style="display: none;" id="charNum">0 characters</p>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-right">Status <span class="text-danger">*</span></label>
                                                                <select name="status" class="form-control">
                                                                    <option @if($welcometitle->status == 1) selected @endif value="1">Active</option>
                                                                    <option @if($welcometitle->status == 0) selected @endif value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="btn btn-success">Update Welcome Status</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                                <form action="{{ route('admin.homepagesetting.update', $youtubesection->id)}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-right"> Youtube Section Title <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" value="{{$youtubesection->name}}" placeholder="Youtbe Section Title" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-right">Status <span class="text-danger">*</span></label>
                                                                <select name="status" class="form-control">
                                                                    <option @if($youtubesection->status == 1) selected @endif value="1">Active</option>
                                                                    <option @if($youtubesection->status == 0) selected @endif value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-right">Youtube Link <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="youtube_link" value="{{$youtubesection->youtube_link}}" placeholder="Youtube Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="{{ $youtubesection->youtube_link }}" frameborder="0" allowfullscreen=""></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="btn btn-success">Update Youtube Section</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('script')
    <script>
        function getImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#loadImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function countChars(obj){
            $("#charNum").show();
            var maxLength = 450;
            var strLength = obj.value.length;
            
            if(strLength > maxLength){
                document.getElementById("charNum").innerHTML = '<span style="color: red;">'+strLength+' out of '+maxLength+' characters</span>';
            }else{
                document.getElementById("charNum").innerHTML = strLength+' out of '+maxLength+' characters';
            }
        }
    </script>
@endsection