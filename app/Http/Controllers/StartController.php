<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStartRequest;
use App\Models\Start;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Starts = Start::all();
        return view('Start.Show', compact('Starts'));
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
    public function store(StoreStartRequest $request)
    {
        // return $request->image;

        $name = \Str::slug($request->input('name'));
        $filename = $name . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('img', $filename, 'upload_image');
        Start::create(['name' => $request->name, 'description' => $request->description, 'image' => $filename]);
        Session::flash('success', 'Le Start a bien été ajouter');
        return redirect()->route('Start.index');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $start = Start::findOrfail($request->id);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            Storage::disk('upload_image')->delete('imag/' . $start->image);
            $name = \Str::slug($request->input('name'));
            $filename = $name . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('img', $filename, 'upload_image');
            $start->image = $filename;
        }
        $start->name = $request->name;
        $start->description = $request->description;
        $start->save();

        return redirect()->route('Start.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Start::findOrFail($request->id)->delete();
        Session::flash('success', 'La start a bien été supprimé');
        return redirect()->route('Start.index');
    }
}
