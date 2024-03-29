<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Glossary;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class GlossaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $glossaries = Glossary::latest()->paginate(10);
        return view('admin.glossary.index', compact('glossaries'));
        
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
            'details' => 'required',
        ]);
        Glossary::insert([
            'name' => $request->name,
            'details' => $request->details,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Glossary Successfully Save :-)','Success');
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
            'details' => 'required',
        ]);
        Glossary::findOrFail($id)->update([
            'name' => $request->name,
            'details' => $request->details,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('Glossary Successfully Save :-)','Success');
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
        $golosary = Glossary::findOrFail($id);
        $golosary->delete();
        Toastr::warning('Glossary Successfully delete :-)','info');
        return redirect()->back();
    }
}
