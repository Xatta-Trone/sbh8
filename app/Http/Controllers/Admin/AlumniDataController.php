<?php

namespace App\Http\Controllers\Admin;

use App\Mail\AlumniApproved;
use Illuminate\Http\Request;
use App\Models\Admin\AlumniData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AlumniDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alumni-data.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alumni-data.create');
    }

    public function pending()
    {
        return view('admin.alumni-data.pending');
    }

    public function approve($id)
    {
        $alumni =  AlumniData::findOrFail($id);
        if ($alumni->update(['status' => 1])) {
            $data = AlumniData::findOrFail($id);
            Mail::to($data->email)->send(new AlumniApproved($data));
            flash('Alumni approved')->success();
            return redirect()->back();
        }
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
        $alumni = AlumniData::findOrFail($id);
        return view('admin.alumni-data.edit', compact('alumni'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumni =  AlumniData::findOrFail($id);
        if ($alumni->image) {
            Storage::delete($alumni->image);
        }
        if ($alumni->delete()) {
            flash('Alumni deleted')->success();
            return redirect()->back();
        }
    }
}
