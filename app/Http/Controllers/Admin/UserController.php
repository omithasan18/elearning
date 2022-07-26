<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('role_id', '!=', 1)->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::where('id', '!=', 1)->latest()->get();
        return view('admin.users.create', compact('roles'));
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
            'role_id' => 'required',
            'password' => 'required',
        ]);

        $user_image = $request->file('image');
        $slug = 'user';
        if(isset($user_image)) {
            $user_image_name = $slug.'-'.uniqid().'.'.$user_image->getClientOriginalExtension();
            $upload_path = 'media/user/';
            $user_image->move($upload_path, $user_image_name);
    
            $image_url = $upload_path.$user_image_name;
        }else {
            $image_url = "";
        }

        User::insert([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $image_url,
            'password'=> Hash::make($request->password),
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('User Successfully Save :-)','Success');
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
        $users = User::findOrFail($id);
        $roles = Role::where('id', '!=', 1)->latest()->get();
        return view('admin.users.edit', compact('users', 'roles'));
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
            'role_id' => 'required',
        ]);

        $user_image = $request->file('image');
        $slug = 'user';

        if(isset($user_image)) {
            $user_image_name = $slug.'-'.uniqid().'.'.$user_image->getClientOriginalExtension();
            $upload_path = 'media/user/';
            $user_image->move($upload_path, $user_image_name);
    

            $user_old_image = User::findOrFail($id);

            if ($user_old_image->image) {
                unlink($user_old_image->image);
            }

            $image_url = $upload_path.$user_image_name;

            User::findOrFail($id)->update([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $image_url,
                'password'=> Hash::make($request->password),
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);

            Toastr::success('User Successfully update :-)','Success');
            return redirect()->back();

        }else {
            User::findOrFail($id)->update([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password'=> Hash::make($request->password),
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);

            Toastr::success('User Successfully update without image :-)','Success');
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

        $user = User::findOrFail($id);
        $deleteImage = $user->image;

        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

        $user->delete();

        Toastr::warning('User successfully delete :-)','Success');
        
        return redirect()->back();

    }
}
