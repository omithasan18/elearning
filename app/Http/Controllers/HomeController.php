<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function home(){
        return view('frontEnd.users.home');
    }

    public function course()
    {
        $courses = Course::latest()->paginate(6);
        return view('pages.course', compact('courses'));
    }

    public function courseDetails()
    {
        $courses = Course::latest()->paginate(6);
        return view('pages.coursedetails', compact('courses'));
    }

    public function lessonDetails()
    {
        $courses = Course::latest()->paginate(6);
        return view('pages.lessondetails', compact('courses'));
    }
}
