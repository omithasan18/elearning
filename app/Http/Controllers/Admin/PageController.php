<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageCategory;
use App\Models\Page;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Page::latest()->paginate(10);
        $pagescategories = PageCategory::where('status', 1)->latest()->get();
        return view('admin.pages.index', compact('pages', 'pagescategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image' => 'required',
            'page_category_id' => 'required',
        ]);

        $page_image = $request->file('image');
        $slug = 'page';
        if(isset($page_image)) {
            $page_image_name = $slug.'-'.uniqid().'.'.$page_image->getClientOriginalExtension();
            $upload_path = 'media/page/';
            $page_image->move($upload_path, $page_image_name);
    
            $image_url = $upload_path.$page_image_name;
        }else {
            $image_url = "";
        }

        Page::insert([
            'page_category_id' => $request->page_category_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $image_url,
            'long_description' => $request->long_description,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Page Successfully Save :-)','Success');
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
            'page_category_id' => 'required',
        ]);

        $page_image = $request->file('image');
        $slug = 'page';
        if(isset($page_image)) {
            $page_image_name = $slug.'-'.uniqid().'.'.$page_image->getClientOriginalExtension();
            $upload_path = 'media/page/';
            $page_image->move($upload_path, $page_image_name);

            $page_old_image = Page::findOrFail($id);

            if ($page_old_image->image) {
                unlink($page_old_image->image);
            }
    
            $image_url = $upload_path.$page_image_name;

            Page::findOrFail($id)->update([
                'page_category_id' => $request->page_category_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $image_url,
                'long_description' => $request->long_description,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);

            Toastr::success('Page Successfully Save :-)','Success');
            return redirect()->back();

        }else {
            Page::findOrFail($id)->update([
                'page_category_id' => $request->page_category_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'long_description' => $request->long_description,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);

            Toastr::success('Page Successfully without image:-)','Success');
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
        $pages = Page::findOrFail($id);
        $deleteImage = $pages->image;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        $pages->delete();

        Toastr::warning('Page successfully delete :-)','Success');
        return redirect()->back();
    }
}
