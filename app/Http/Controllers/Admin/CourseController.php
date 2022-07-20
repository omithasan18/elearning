<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::latest()->paginate(10);
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('status', 1)->latest()->get();
        return view('admin.course.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'lession_count' => 'required',
            'image' => 'required',
        ]);

        $course_image = $request->file('image');
        $slug = 'course';
        if(isset($course_image)) {
            $course_image_name = $slug.'-'.uniqid().'.'.$course_image->getClientOriginalExtension();
            $upload_path = 'media/course/';
            $course_image->move($upload_path, $course_image_name);
    
            $image_url = $upload_path.$course_image_name;
        }else {
            $image_url = "";
        }
        
        Course::insert([
            'name'=> $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'category_id'=> $request->category_id,
            'image' => $image_url,
            'short_description' => $request->short_description,
            'course_for' => $request->course_for,
            'lession_count' => $request->lession_count,
            'course_time' => $request->course_time,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Course Successfully Save :-)','Success');
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
        $course = Course::findOrFail($id);
        $categories = Category::where('status', 1)->latest()->get();
        return view('admin.course.edit', compact('categories', 'course'));
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
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'lession_count' => 'required',
        ]);

        $course_image = $request->file('image');
        $slug = 'course';

        if(isset($course_image)) {

            $course_image_name = $slug.'-'.uniqid().'.'.$course_image->getClientOriginalExtension();
            $upload_path = 'media/course/';
            $course_image->move($upload_path, $course_image_name);

            $course_old_image = Course::findOrFail($id);

            if ($course_old_image->image) {
                unlink($course_old_image->image);
            }
            $image_url = $upload_path.$course_image_name;

            Course::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'category_id'=> $request->category_id,
                'image' => $image_url,
                'short_description' => $request->short_description,
                'course_for' => $request->course_for,
                'lession_count' => $request->lession_count,
                'course_time' => $request->course_time,
                'updated_at' => Carbon::now(),
            ]);
            
            Toastr::success('Course Successfully Save :-)','Success');
            return redirect()->back();

        }else {
            Course::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'category_id'=> $request->category_id,
                'short_description' => $request->short_description,
                'course_for' => $request->course_for,
                'lession_count' => $request->lession_count,
                'course_time' => $request->course_time,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Course Successfully save without image :-)','Success');
            return redirect()->back();

        }
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
        $course = Course::findOrFail($id);
        $deleteImage = $course->image;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        $course->delete();

        Toastr::warning('Course successfully delete :-)','Success');
        return redirect()->back();

    }
    public function checkCourse(Request $request)
    {
        $validcoursenameslug = $request->valid_course_name_slug;
        // dd($validcoursenameslug);
        // exit;
   
        $result = DB::table('courses')->where('name', $validcoursenameslug)->get();
   
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
