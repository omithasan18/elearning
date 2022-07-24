@extends('admin.layouts.app')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Site Setting</li>
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
                        <div class="card card-info">
                            <form class="form-horizontal" action="{{route('admin.site-setting.update', $website->id)}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-header bg-success">
                                    <h3 class="card-title">Website Setting</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Website Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name" value="{{$website->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email Address</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" value="{{$website->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Logo</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onChange="mainTham(this)" name="logo" class="custom-file-input">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Current Logo</label>
                                        <div class="col-sm-8">
                                            <img width="100" height="100" src="@if($website->logo) {{asset($website->logo)}} @else {{ asset('demomedia/demo.jpg') }} @endif" id="showTham" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Favicon</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onChange="mainFavion(this)" name="favicon" class="custom-file-input">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Current Favicon</label>
                                        <div class="col-sm-8">
                                            <img width="50" height="50" src="@if($website->favicon) {{asset($website->favicon)}} @else {{ asset('demomedia/demo.jpg') }}@endif" id="favion">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Meta Image</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onChange="mainMetaImage(this)" name="meta_image" class="custom-file-input">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Current Meta Image</label>
                                        <div class="col-sm-8">
                                            <img width="100" height="100" src="@if($website->meta_image) {{asset($website->meta_image)}} @else {{ asset('demomedia/demo.jpg') }}@endif" id="metaimage">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Phone Number</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="phone" value="{{$website->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="meta_title" value="{{$website->meta_title}}" placeholder="Meta Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Keyword</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="keyword" value="{{$website->keyword}}" placeholder="Keyword">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Description</label>
                                        <div class="col-sm-8">
                                            <textarea name="description" class="form-control" cols="30" rows="3" placeholder="Description">{{$website->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="3" name="address">{!! $website->address !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header bg-primary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Additional Information</h3>
                                        </div>
                                        <div class="col-md-6 text-right">
                                                <input type="hidden" id="website_row_number" value="{{ rand(111, 999) }}">
                                            <button type="button" class="btn btn-success" onclick="addNewAdditionalInfo()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Website Icon</th>
                                                <th>Website Link</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_row">
                                            @php
                                                $icon = explode("|",$website->icon);
                                                $link = explode("|",$website->link);
                                            @endphp
                                            @foreach($icon as $key=>$icon)
                                                <tr id="website_remove_row_{{$key}}">
                                                    <td>
                                                        <input type="text" name="icon[]" value="{{$icon}}" class="form-control" placeholder="Icon form frontawsome">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="link[]" value="@if(isset($link[$key])){{$link[$key]}}@endif" class="form-control" placeholder="Website link like https://">
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" onclick="websiteRemovieRow(this)" id="{{$key}}" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-info btn-lg">Update Website</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('script')
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        function mainTham(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showTham').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function mainFavion(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#favion').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function mainMetaImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#metaimage').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function addNewAdditionalInfo() {
            // alert('helo');
            var website_row_number = $("#website_row_number").val();
            // alert(amount_id);
            var new_row_number = Math.floor(Math.random()*(999-100+1)+100);
            if($("#website_remove_row_" + website_row_number).new_row_number == 0) {
                var new_id = Math.floor(Math.random()*(999-100+1)+100);
            }
            $.ajax({
                type    : "POST",
                url     : "{{ route('admin.row.addremove') }}",
                data    : {
                    id      : website_row_number,
                    _token  : '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    $('#show_row').append(data);
                    $('#website_row_number').val(new_row_number);
                },
            });
        };
        function websiteRemovieRow(obj) {
            // alert('Hell');
            var website_row_number = obj.id;
            // alert(website_row_number);
            $("#website_remove_row_" + website_row_number).remove();
        };
    </script>
@endsection