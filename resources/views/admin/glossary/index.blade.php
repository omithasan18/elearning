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
                            <li class="breadcrumb-item active">Glossary</li>
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
                                            <strong>Glossary</strong>
                                            <span class="badge bg-blue">{{ $glossaries->count() }}</span>
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
                                            <h4 class="modal-title">Create Glossary</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" action="{{route('admin.glossary.store')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-md-2 text-right">Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="name" placeholder="Glossary Name" required >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 text-right">Details</label>
                                                    <div class="col-md-10">
                                                        <textarea name="details" id="" cols="30" rows="3" class="form-control summernote" placeholder="Details"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-success">Create Glossary</button>
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
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($glossaries as $key => $glossary)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$glossary->name}}</td>
                                                <td class="text-center">{!! substr($glossary->details, 0,  120) !!}</td>
                                                <td>
                                                    <button title="Edit page" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button title="Delete page" class="btn btn-danger waves-effect" type="button" onclick="deleteData({{ $glossary->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $glossary->id }}" action="{{ route('admin.glossary.destroy', $glossary->id) }}" method="POST" style="display: none;">
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
                                                                <form class="form-horizontal" action="{{ route('admin.glossary.update', $glossary->id)}}" enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group row">
                                                                        <label class="col-md-2 text-right">Name</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="name" value="{{$glossary->name}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-2 text-right">Details</label>
                                                                        <div class="col-md-10">
                                                                            <textarea name="details" id="" cols="30" rows="3" class="form-control summernote" placeholder="Details">{{ $glossary->details }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-2 col-sm-10">
                                                                            <button type="submit" class="btn btn-success">Update Glossary</button>
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
                                    {{ $glossaries->links() }}
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