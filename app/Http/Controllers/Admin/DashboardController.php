<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function homePageSetting()
    {
        $welcometitle = HomePage::where('id', 1)->first();
        $youtubesection = HomePage::where('id', 2)->first();
        // return $welcometitle;
        return view('admin.homepage.index', compact('welcometitle', 'youtubesection'));
    }
    
    public function homePageSettingUpdate(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);

        $welcome_image = $request->file('image');
        $slug = 'welcome';

        if(isset($welcome_image)) {

            $welcome_image_name = $slug.'-'.uniqid().'.'.$welcome_image->getClientOriginalExtension();
            $upload_path = 'media/welcome/';
            $welcome_image->move($upload_path, $welcome_image_name);

            $welcome_old_image = HomePage::findOrFail($id);

            if ($welcome_old_image->image) {
                unlink($welcome_old_image->image);
            }

            $image_url = $upload_path.$welcome_image_name;

            HomePage::findOrFail($id)->update([
                'name'=> $request->name,
                'image' => $image_url,
                'details' => $request->details,
                'status' => $request->status,
                'youtube_link' => $request->youtube_link,
                'updated_at' => Carbon::now(),
            ]);
            
            Toastr::success('Home Page Successfully Save :-)','Success');
            return redirect()->back();

        }else {
            HomePage::findOrFail($id)->update([
                'name'=> $request->name,
                'details' => $request->details,
                'status' => $request->status,
                'youtube_link' => $request->youtube_link,
                'updated_at' => Carbon::now(),
            ]);
            Toastr::success('Home Page Successfully Save :-)','Success');
            return redirect()->back();

        }
    }
}
