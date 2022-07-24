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
                                            <strong>Page</strong>
                                            <span class="badge bg-blue">{{ $pages->count() }}</span>
                                        </h3>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="text-right cutom_search" >
                                            <button type="button" title="Add page" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                                <i class="fa fa-plus-circle mr-2"></i>
                                                <span>Add Page</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="create">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create Page</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" action="{{route('admin.pages.store')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Page Category</label>
                                                    <div class="col-md-9">
                                                        <select name="page_category_id" id="" class="form-control">
                                                            <option value="1" selected disabled>Select One</option>
                                                            @foreach($pagescategories as $pagecategory)
                                                            <option value="{{ $pagecategory->id }}" >{{ $pagecategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="name" placeholder="Page Name" required >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Image</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" onChange="getImage(this)" name="image" class="custom-file-input">
                                                                <label class="custom-file-label">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <img width="80" height="80" src="{{ asset('demomedia/demo.jpg') }}" id="loadImage">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-right">Description</label>
                                                    <div class="col-md-9">
                                                        <textarea name="long_description" id="" cols="30" rows="3" class="form-control summernote" placeholder="Long Description"></textarea>
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
                                                        <button type="submit" class="btn btn-success">Create Page</button>
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
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages as $key => $page)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{ $page['pagecategory']['name'] }}</td>
                                                <td>{{$page->name}}</td>
                                                <td>
                                                    <img width="100" height="80" src="{{asset($page->image)}}">
                                                </td>
                                                <td class="text-center">{!! substr($page->long_description, 0,  25) !!}</td>
                                                <td>
                                                    <button title="Edit page" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button title="Delete page" class="btn btn-danger waves-effect" type="button" onclick="deleteData({{ $page->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $page->id }}" action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                                <div class="modal fade" id="edit_{{$key}}">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Notice</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="{{ route('admin.pages.update', $page->id)}}" enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Page Category</label>
                                                                        <div class="col-md-9">
                                                                            <select name="page_category_id" id="" class="form-control">
                                                                                <option value="1" selected disabled>Select One</option>
                                                                                @foreach($pagescategories as $pagecategory)
                                                                                <option @if($pagecategory->id == $page->page_category_id) selected @endif value="{{ $pagecategory->id }}" >{{ $pagecategory->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="name" value="{{$page->name}}">
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
                                                                                <img width="60" height="60" src="@if($page->image) {{ asset($page->image) }} @else {{ asset('demomedia/category.png') }} @endif" class="editcategoryImage">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Meta Descript</label>
                                                                        <div class="col-md-9">
                                                                            <textarea name="long_description" id="" cols="30" rows="3" class="form-control summernote" placeholder="Meta Description">{{ $page->long_description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 text-right">Status</label>
                                                                        <div class="col-md-9">
                                                                            <select name="status" id="" class="form-control">
                                                                                <option value="1" @if($page->status == 1) selected @endif>Active</option>
                                                                                <option value="0" @if($page->status == 0) selected @endif>Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-3 col-sm-9">
                                                                            <button type="submit" class="btn btn-success">Update Page</button>
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
                                    {{ $pages->links() }}
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
        function getImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#loadImage').attr('src', e.target.result)
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

        $(function () {
            // Summernote
            $('.summernote').summernote()
        });
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
        };
    </script>
@endsection