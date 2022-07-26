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
                            <li class="breadcrumb-item active">Question</li>
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
                                            <strong>Question</strong>
                                            <span class="badge bg-blue">{{ $questions->count() }}</span>
                                        </h3>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="text-right cutom_search" >
                                            <a class="btn btn-success" href="{{ route('admin.question.create') }}">
                                                <i class="fa fa-plus-circle mr-2"></i>
                                                <span>Add Question</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>                  
                                        <tr>
                                            <th width="2%">SL</th>
                                            <th>Course</th>
                                            <th>Question</th>
                                            <th>Mark</th>
                                            <th class="bg-success">Answer</th>
                                            <th class="bg-info">Option One</th>
                                            <th class="bg-info">Option Two</th>
                                            <th class="bg-info">Option Three</th>
                                            <th class="bg-info">Option Four</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $key => $question)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{ $question['course']['name'] }}</td>
                                                <td>{{ substr($question->question, 0,  25) }}</td>
                                                <td class="">{{ $question->mark }}</td>
                                                <td >
                                                    @if($question->answer == "option_one")
                                                        <span class="badge bg-success">{{ $question->option_one}}</span>
                                                    @elseif($question->answer == "option_two")
                                                        <span class="badge bg-success">{{ $question->option_two}}</span>
                                                    @elseif($question->answer == "option_three")
                                                        <span class="badge bg-success">{{ $question->option_three}}</span>
                                                    @elseif($question->answer == "option_four")
                                                        <span class="badge bg-success">{{ $question->option_four}}</span>
                                                    @endif
                                                </td>
                                                <td class="text-info">{{ $question->option_one }}</td>
                                                <td class="text-info">{{ $question->option_two }}</td>
                                                <td class="text-info">{{ $question->option_three }}</td>
                                                <td class="text-info">{{ $question->option_four }}</td>
                                                <td class="text-info">
                                                    @if($question->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-success">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a title="Edit question" href="{{ route('admin.question.edit', $question->id) }}" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button title="Delete question" class="btn btn-danger waves-effect" type="button" onclick="deleteData({{ $question->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $question->id }}" action="{{ route('admin.question.destroy', $question->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $questions->links() }}
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
    </script>
@endsection