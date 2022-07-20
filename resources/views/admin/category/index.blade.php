@extends('admin.layouts.app')

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
                            <li class="breadcrumb-item active">Categories</li>
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
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <h3>
                                            <strong>Category</strong>
                                            <span class="badge bg-blue">{{ $categories->count() }}</span>
                                        </h3>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="text-right cutom_search" >
                                            <button type="button" title="Add Category" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                                <i class="fa fa-plus-circle mr-2"></i>
                                                <span>Add Category</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="create">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" action="{{route('admin.category.store')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="name" placeholder="Category Name" required id="valid_category_name_slug">
                                                        <span id="response_id"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Image</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" onChange="categoryImageCreate(this)" name="image" class="custom-file-input">
                                                                <label class="custom-file-label">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <img width="80" height="80" src="{{ asset('demomedia/demo.jpg') }}" id="categoryimagecreate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Meta Keyword</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keyword">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Meta Descript</label>
                                                    <div class="col-md-9">
                                                        <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" placeholder="Meta Description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status" id="" class="form-control">
                                                            <option value="1" selected>Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-3 col-sm-9">
                                                        <button type="submit" class="btn btn-success">Create Category</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>                  
                                        <tr>
                                            <th>SL No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key => $category)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><img width="100" height="80" src="{{asset($category->image)}}" alt=""></td>
                                                <td>
                                                    @if($category->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-warning">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button title="Edit Blog" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button title="Delete Blog" class="btn btn-danger waves-effect" type="button" onclick="deleteData({{ $category->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                                <div class="modal fade" id="edit_{{$key}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Notice</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="{{ route('admin.category.update', $category->id)}}" enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Image</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <input type="file" onChange="categoryImage(this)" name="image" class="custom-file-input">
                                                                                    <label class="custom-file-label">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right"></label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                <img width="60" height="60" src="@if($category->image) {{ asset($category->image) }} @else {{ asset('demomedia/category.png') }} @endif" class="editcategoryImage">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Meta Keyword</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keyword" value="{{ $category->meta_keyword }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Meta Descript</label>
                                                                        <div class="col-md-9">
                                                                            <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" placeholder="Meta Description">{{ $category->meta_description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Status</label>
                                                                        <div class="col-md-9">
                                                                            <select name="status" id="" class="form-control">
                                                                                <option value="1" @if($category->status == 1) selected @endif>Active</option>
                                                                                <option value="0" @if($category->status == 0) selected @endif>Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-3 col-sm-9">
                                                                            <button type="submit" class="btn btn-success">Update Category</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $categories->links() }}
                                </ul>
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
        function categoryImageCreate(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#categoryimagecreate').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function categoryImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.editcategoryImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src="{{ asset('massage/sweetalert/sweetalert.all.js') }}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
        $(document).ready(function(){
            $("#valid_category_name_slug").blur( function(){
                // alert('ok');
                var valid_category_name_slug = $("#valid_category_name_slug").val();
                // alert(valid_category_name_slug);
                var incorrect = "<font color=red  font-size=16px>This category alrady in database.</font>";
                var correct = "<font color=green  font-size=20px>This category is available</font>";
                var url ="{{ route('admin.valid_category_name_slug')}}";
                var token = "{{ csrf_token() }}";
                // alert(url);
                // alert(token);
                if (valid_category_name_slug != '') {
                    // alert(valid_category_name_slug);
                    $.ajax({
                        type:'post',
                        url:url,
                        data:{valid_category_name_slug:valid_category_name_slug, _token:token},
                        success:function(resp){
                            var response = JSON.parse(resp);
                            if (response.status == 1){
                                $("#response_id").html(incorrect);
                            }
                            else {
                                $("#response_id").html(correct);
                            }
                        },
                        error:function(){
                            alert("Error!");
                        }
                    });
                } else {
                    $("#response_id").empty();

                }

            });
        })
    </script>
@endsection