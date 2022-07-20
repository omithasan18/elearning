@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Course</li>
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
                                <h3>Create Crouse</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.course.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-right">Course Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" placeholder="Course Name" id="valid_course_name_slug">
                                                <span id="response_id"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-right">Course Category <span class="text-danger">*</span></label>
                                                <select name="category_id" class="form-control">
                                                    <option value="" selected disabled>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-right">Course Image <span class="text-danger">*</span></label>
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
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-right">Course Short Description <span class="text-danger">*</span></label>
                                                <textarea name="short_description" onkeyup="countChars(this);" class="form-control" id="" cols="30" rows="5" placeholder="Short Description"></textarea>
                                                <p style="display: none;" id="charNum">0 characters</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-right">Course For</label>
                                                <select name="course_for" class="form-control">
                                                    <option value="Beginner" selected>Beginner</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Advanced">Advanced</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-right">Lession Count  <span class="text-danger">*</span></label>
                                                <input type="number" name="lession_count" class="form-control" placeholder="Lession Count">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-right">Course Time  <span class="text-danger">*</span></label>
                                                <input type="text" name="course_time" class="form-control" placeholder="Course Time Hours / Minuites">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success">Create Course</button>
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
        
        $(document).ready(function(){
            $("#valid_course_name_slug").blur( function(){
                // alert('ok');
                var valid_course_name_slug = $("#valid_course_name_slug").val();
                // alert(valid_course_name_slug);
                var incorrect = "<font color=red  font-size=16px>This Course alrady in database.</font>";
                var correct = "<font color=green  font-size=20px>This Course is available</font>";
                var url ="{{ route('admin.valid_course_name_slug')}}";
                var token = "{{ csrf_token() }}";
                // alert(url);
                // alert(token);
                if (valid_course_name_slug != '') {
                    // alert(valid_course_name_slug);
                    $.ajax({
                        type:'post',
                        url:url,
                        data:{valid_course_name_slug:valid_course_name_slug, _token:token},
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
        });
    </script>
    <script>
        function countChars(obj){
            $("#charNum").show();
            var maxLength = 180;
            var strLength = obj.value.length;
            
            if(strLength > maxLength){
                document.getElementById("charNum").innerHTML = '<span style="color: red;">'+strLength+' out of '+maxLength+' characters</span>';
            }else{
                document.getElementById("charNum").innerHTML = strLength+' out of '+maxLength+' characters';
            }
        }
    </script>
@endsection