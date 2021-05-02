<?php

namespace App\Repository\Star;

use App\Interfaces\star\StarRepositoryInterface;
use App\Models\star;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StarRepository implements StarRepositoryInterface
{

    public function index()
    {
        $stars = star::all();
        return view('Star.Show', compact('stars'));
    }

    public function store($request)
    {

        $name = \Str::slug($request->input('name'));
        $filename = $name . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('img', $filename, 'upload_image');
        Star::create(['name' => $request->name, 'description' => $request->description, 'image' => $filename]);
        Session::flash('success', 'The star has been added successfully');
        return redirect()->route('Star.index');
    }

    public function update($request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $star = Star::findOrfail($request->id);


        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            Storage::disk('upload_image')->delete('img/' . $star->image);
            $name = \Str::slug($request->input('name'));
            $filename = $name . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('img', $filename, 'upload_image');
            $star->image = $filename;
        }
        $star->name = $request->name;
        $star->description = $request->description;
        $star->save();
        Session::flash('success', 'The star has been updated successfully ');
        return redirect()->route('Star.index');
    }


    public function destroy($request)
    {
        Star::findOrFail($request->id)->delete();
        Session::flash('success', 'The star has been deleted successfully');
        return redirect()->route('Star.index');
    }
}
