<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
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
        ]);

        $category_image = $request->file('image');
        $slug = 'category';
        if(isset($category_image)) {
            $category_image_name = $slug.'-'.uniqid().'.'.$category_image->getClientOriginalExtension();
            $upload_path = 'media/category/';
            $category_image->move($upload_path, $category_image_name);
    
            $image_url = $upload_path.$category_image_name;
        }else {
            $image_url = "";
        }
        Category::insert([
            'name'=> $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $image_url,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Category Successfully Save :-)','Success');
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
        ]);

        $category_image = $request->file('image');
        $slug = 'category';
        if(isset($category_image)) {
            $category_image_name = $slug.'-'.uniqid().'.'.$category_image->getClientOriginalExtension();
            $upload_path = 'media/category/';
            $category_image->move($upload_path, $category_image_name);

            $category_old_image = Category::findOrFail($id);
            if ($category_old_image->image) {
                unlink($category_old_image->image);
            }
    
            $image_url = $upload_path.$category_image_name;
            Category::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $image_url,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Category Successfully Save :-)','Success');
            return redirect()->back();
        }else {
            Category::findOrFail($id)->update([
                'name'=> $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Category Successfully save without image :-)','Success');
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
        $category = Category::findOrFail($id);
        $deleteImage = $category->image;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        $category->delete();

        Toastr::warning('Category successfully delete :-)','Success');
        return redirect()->back();
    }

    public function checkCategory(Request $request)
    {
        $validcategorynameslug = $request->valid_category_name_slug;
        // dd($validcategorynameslug);
        // exit;
   
        $result = DB::table('categories')->where('name', $validcategorynameslug)->get();
   
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
