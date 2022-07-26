<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Badge;
use Brian2694\Toastr\Facades\Toastr;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $badges = Badge::latest()->paginate(10);
        return view('admin.badge.index', compact('badges'));
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

        $badge_image = $request->file('image');
        $slug = 'badge';
        if(isset($badge_image)) {
            $badge_image_name = $slug.'-'.uniqid().'.'.$badge_image->getClientOriginalExtension();
            $upload_path = 'media/badge/';
            $badge_image->move($upload_path, $badge_image_name);
    
            $image_url = $upload_path.$badge_image_name;
        }else {
            $image_url = "";
        }
        Badge::insert([
            'name'=> $request->name,
            'image' => $image_url,
            'point'=> $request->point,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Badge Successfully Save :-)','Success');
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

        $badge_image = $request->file('image');
        $slug = 'badge';
        if(isset($badge_image)) {
            $badge_image_name = $slug.'-'.uniqid().'.'.$badge_image->getClientOriginalExtension();
            $upload_path = 'media/badge/';
            $badge_image->move($upload_path, $badge_image_name);

            $badge_old_image = Badge::findOrFail($id);
            if ($badge_old_image->image) {
                unlink($badge_old_image->image);
            }

            $image_url = $upload_path.$badge_image_name;

            Badge::findOrFail($id)->update([
                'name'=> $request->name,
                'image' => $image_url,
                'point'=> $request->point,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);
            Toastr::success('Badge Successfully updated :-)','Success');
            return redirect()->back();

        }else {

            Badge::findOrFail($id)->update([
                'name'=> $request->name,
                'point'=> $request->point,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);
            Toastr::success('Badge Successfully Save :-)','Success');
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
        $badge = Badge::findOrFail($id);
        $deleteImage = $badge->image;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        $badge->delete();

        Toastr::warning('Badge successfully delete :-)','Success');
        return redirect()->back();
    }
}
