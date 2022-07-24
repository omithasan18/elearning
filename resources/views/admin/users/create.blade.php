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
                            <li class="breadcrumb-item active">Create User</li>
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
                                <h3>Create User</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-right">User Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" placeholder="User Name" id="valid_User_name_slug">
                                                <span id="response_id"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-right">User Role <span class="text-danger">*</span></label>
                                                <select name="role_id" class="form-control">
                                                    <option value="" selected disabled>Select Category</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Phone Number</label>
                                            <input type="number" class="form-control" name="phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-right">User Image <span class="text-danger">*</span></label>
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
                                                        <img width="80" height="80" src="{{ asset('demomedia/demo.jpg') }}" id="loadImage">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-right">User Address  </label>
                                                <textarea name="address" class="form-control" cols="30" rows="4" placeholder="User Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="" disabled> Select One</option>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success">Create User</button>
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
    <script>
        function getImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#loadImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        };
    </script>
@endsection