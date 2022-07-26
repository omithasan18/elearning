<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;
use File;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lessons = Lesson::latest()->paginate(10);
        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::latest()->get();
        return view('admin.lesson.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function courseLessonCheck($id)
    {
        $course = Course::where('id', $id)->first();
        $countlesson = $course->lession_count;
        // return $countlesson;
        $lessons = Lesson::where('course_id', $id)->get();
        // return $lessons->count();
        if($countlesson > $lessons->count()){
            $data['status'] = 1;
            return json_encode($data);
        }else {
            $data['status'] = 0;
            return json_encode($data);
        }
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'video' => 'mimes:mp4',
            'description' => 'required',
        ]);
        
        $lesson_image = $request->file('image');
        $slug1 = 'lesson';
        if(isset($lesson_image)) {
            $lesson_image_name = $slug1.'-'.uniqid().'.'.$lesson_image->getClientOriginalExtension();
            $upload_path = 'media/lesson/image/';
            $lesson_image->move($upload_path, $lesson_image_name);
    
            $image_url = $upload_path.$lesson_image_name;
        }else {
            $image_url = NULL;
        }

        $lesson_video = $request->file('video');
        $slug2 = 'video';
        if(isset($lesson_video)) {
            $lesson_video_name = $slug2.'-'.uniqid().'.'.$lesson_video->getClientOriginalExtension();
            $upload_path = 'media/lesson/video/';
            $lesson_video->move($upload_path, $lesson_video_name);
    
            $video_url = $upload_path.$lesson_video_name;
        }else {
            $video_url = NULL;
        }
        
        Lesson::insert([
            'course_id'=> $request->course_id,
            'name'=> $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $image_url,
            'lesson_time' => $request->lesson_time,
            'youtube_link' => $request->youtube_link,
            'video' => $video_url,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Lesson Successfully Save :-)','Success');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $lesson = Lesson::findOrFail($id);
        $courses = Course::latest()->get();
        return view('admin.lesson.edit', compact('courses', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'video' => 'mimes:mp4',
            'description' => 'required',
        ]);
        
        $lesson_image = $request->file('image');
        $slug1 = 'lesson';

        if(isset($lesson_image)) {
            $lesson_image_name = $slug1.'-'.uniqid().'.'.$lesson_image->getClientOriginalExtension();
            $upload_path = 'media/lesson/image/';
            $lesson_image->move($upload_path, $lesson_image_name);

            $lesson_old_image = Lesson::findOrFail($id);

            if ($lesson_old_image->image) {
                unlink($lesson_old_image->image);
            }

            $image_url = $upload_path.$lesson_image_name;
        }else {
            $lesson_old_image = Lesson::findOrFail($id);
            $image_url = $lesson_old_image->image;
        }

        $lesson_video = $request->file('video');
        $slug2 = 'video';

        if(isset($lesson_video)) {
            $lesson_video_name = $slug2.'-'.uniqid().'.'.$lesson_video->getClientOriginalExtension();
            $upload_path = 'media/lesson/video/';
            $lesson_video->move($upload_path, $lesson_video_name);

            $lesson_old_video = Lesson::findOrFail($id);

            if ($lesson_old_video->video) {
                unlink($lesson_old_video->video);
            }

            $video_url = $upload_path.$lesson_video_name;
            
        }else {
            $lesson_old_video = Lesson::findOrFail($id);
            $video_url = $lesson_old_video->video;
        }

        Lesson::findOrFail($id)->update([
            'course_id'=> $request->course_id,
            'name'=> $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $image_url,
            'lesson_time' => $request->lesson_time,
            'youtube_link' => $request->youtube_link,
            'video' => $video_url,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Lesson Successfully update :-)','Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $lesson = Lesson::findOrFail($id);
        $deleteImage = $lesson->image;
        $deleteVideo = $lesson->video;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        if (File::exists($deleteVideo)) {
            //File::delete($image_path);
            unlink($deleteVideo);
        }

        $lesson->delete();

        Toastr::warning('Lesson successfully delete :-)','Success');
        return redirect()->back();
    }

    public function checkLesson(Request $request)
    {
        $validlessonnameslug = $request->valid_lesson_name_slug;
        // dd($validlessonnameslug);
        // exit;
   
        $result = DB::table('lessons')->where('name', $validlessonnameslug)->get();
   
        if(count($result) > 0)
        {
          $data['status'] = 1;
          echo json_encode($data);
        }
        else {
          $data['status'] = 0;
          echo json_encode($data);
        }
    }
}
