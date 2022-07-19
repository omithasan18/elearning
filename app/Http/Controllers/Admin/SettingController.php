<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class SettingController extends Controller
{
    public function profile(){
        return view('admin.profile');
    }
    public function update_profile(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'phone' => 'max:15',
        ]);
            $data = User::find(Auth::user()->id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            if($request->hasFile('image')) {
                $image = $request->image;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                   mkdir($folder, 0777, true);
                }

                $m_image = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->save($m_image);
                $data->image = asset($m_image);
            }
            $data->Update();
            $notification=array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
    public function change_password(){
        return view('admin.profile.change_pass');
    }
    public function update_password(Request $request){
        $data = User::where('id',Auth::user()->id)->first();
        if($request->old_password){
            
            $this->validate($request, [
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]);
            if (!(Hash::check($request->get('old_password'), $data->password))) {
                $notification=array(
                    'message' => 'Your Old password does not matches with the password you provided. Please try again!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
                // The passwords matches
            }
            $data->password = bcrypt($request->password);
        }
        $data->save();
        $notification=array(
            'message' => 'Successfully Updated Password!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
