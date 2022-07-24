<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Question::latest()->paginate(10);
        return view('admin.question.index', compact('questions'));
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
        return view('admin.question.create', compact('courses'));

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
            'question' => 'required',
            'course_id' => 'required',
            'answer' => 'required',
            'option_one' => 'required',
            'option_two' => 'required',
            'option_three' => 'required',
            'option_four' => 'required',
        ]);
        Question::insert([
            'course_id' => $request->course_id,
            'question' => $request->question,
            'slug' => strtolower(str_replace(' ', '-', $request->question)),
            'mark' => $request->mark,
            'answer' => $request->answer,
            'option_one' => $request->option_one,
            'option_two' => $request->option_two,
            'option_three' => $request->option_three,
            'option_four' => $request->option_four,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Question Successfully Save :-)','Success');
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
        $question = Question::findOrFail($id);
        $courses = Course::latest()->get();
        return view('admin.question.edit', compact('courses', 'question'));
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
            'question' => 'required',
            'course_id' => 'required',
            'answer' => 'required',
            'option_one' => 'required',
            'option_two' => 'required',
            'option_three' => 'required',
            'option_four' => 'required',
        ]);
        Question::findOrFail($id)->update([
            'course_id' => $request->course_id,
            'question' => $request->question,
            'slug' => strtolower(str_replace(' ', '-', $request->question)),
            'mark' => $request->mark,
            'answer' => $request->answer,
            'option_one' => $request->option_one,
            'option_two' => $request->option_two,
            'option_three' => $request->option_three,
            'option_four' => $request->option_four,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Question Successfully updated :-)','Success');
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
        $question = Question::findOrFail($id);

        $question->delete();

        Toastr::warning('Question Successfully delete :-)','Success');
        return redirect()->back();
    }
}
