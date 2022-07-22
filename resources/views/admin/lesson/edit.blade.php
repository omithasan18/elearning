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
                            <li class="breadcrumb-item active">Edit Course</li>
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
                        <form action="{{route('admin.lesson.update', $lesson->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h3>Edit Lesson</h3>
                                </div>
                                <div class="card-header text-center">
                                    <div class="row col-md-4 m-auto">
                                        <label><h4>First Select Your Course <span class="text-danger">*</span> </h4></label>
                                        <select name="course_id" id="courseId" class="form-control">
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach($courses as $course)
                                                <option @if($course->id == $lesson->course_id) selected @endif value="{{ $course->id }}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="responseCourseLesson"></span>
                                    </div>
                                </div>
                                <div class="card-body" id="showLessonArea">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-right">Lesson Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" value="{{ $lesson->name }}" placeholder="Lesson Name" id="valid_lesson_name_slug">
                                                <span id="response_id"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-right">Lesson Image <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onChange="getImage(this)" name="image" class="custom-file-input">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <img width="80" height="80" src="{{ asset($lesson->image) }}" id="loadImage">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-right">Lesson youtube Link </label>
                                                <input type="text" class="form-control" name="youtube_link" value="{{ $lesson->youtube_link }}" placeholder="Lesson youtube link">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="text-right">Lesson Video </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="video" class="custom-file-input">
                                                    <label class="custom-file-label">Choose Video</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-right">Lesson Time</label>
                                                <input type="text" class="form-control" name="lesson_time" value="{{ $lesson->lesson_time }}" placeholder="Lesson Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Lesson Description</label>
                                            <textarea class="form-control summernote" name="description" placeholder="Lesson Description">{{ $lesson->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" id="showLessonAreaFooter">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success">Update Lesson</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

        $(function () {
            // Summernote
            $('.summernote').summernote()
        });

        $('#courseId').on('change', function(){
            var courseId = $(this).val();
            var lessionMassage = "<font color=red  font-size=16px>This course all lesson alrady created. </font>";
            var lessionMassage2 = "<font color=green  font-size=20px>This course lession available. </font>";
            // alert(courseId);
            if(courseId) {
                $.ajax({
                    url: "{{  url('/superadmin/course-lesson-ajax') }}/"+courseId,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        // console.log(data);
                        var response = data;
                        console.log(response);
                        if (response.status == 1){
                            $("#showLessonArea").show();
                            $("#showLessonAreaFooter").show();
                            $("#responseCourseLesson").html(lessionMassage2);
                        }
                        else {
                            $("#showLessonArea").hide();
                            $("#showLessonAreaFooter").hide();
                            $("#responseCourseLesson").html(lessionMassage);
                        }
                    },
                });
            } else {
                alert('danger');
            }
        });

        $(document).ready(function(){
            $("#valid_lesson_name_slug").blur( function(){
                // alert('ok');
                var valid_lesson_name_slug = $("#valid_lesson_name_slug").val();
                // alert(valid_lesson_name_slug);
                var incorrect = "<font color=red  font-size=16px>This lesson alrady in database.</font>";
                var correct = "<font color=green  font-size=20px>This lesson is available</font>";
                var url ="{{ route('admin.valid_lesson_name_slug')}}";
                var token = "{{ csrf_token() }}";
                // alert(url);
                // alert(token);
                if (valid_lesson_name_slug != '') {
                    // alert(valid_lesson_name_slug);
                    $.ajax({
                        type:'post',
                        url:url,
                        data:{valid_lesson_name_slug:valid_lesson_name_slug, _token:token},
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
@endsection