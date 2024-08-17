<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::latest()->get();
        return view('admin.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'phone_no' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
        ]);
        if ($validation) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/tours'), $imageName);
                $validation['image'] = $imageName;
            }
            Tour::create($validation);
            return redirect()->route('admin.guides.index')->with('success', 'Tour Added Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::find($id);
        return view('admin.tours.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::find($id);
        return view('admin.tours.edit', compact('tour'));
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
        $validation = $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'phone_no' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
        ]);
        $tour = Tour::find($id);

        if ($validation) {
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($tour->image && file_exists(public_path('/images/tours') . '/' . $tour->image)) {
                    unlink(public_path('/images/tours') . '/' . $tour->image);
                }

                $file = $request->file('image');
                $file_name = uniqid() . $file->getClientOriginalName();
                $file->move(public_path('/images/tours'), $file_name);

                $tour->image = $file_name;
            }

            $tour->update($request->except(['image']));

            return redirect()->route('admin.guides.index')->with('success', 'Tour updated successfully');
        } else {
            return redirect()->back()->with('error', 'Tour update failed');
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
        $tour = Tour::find($id);
        if ($tour->image && file_exists(public_path('/images/tours') . '/' . $tour->image)) {
            unlink(public_path('/images/tours') . '/' . $tour->image);
        }
        $tour->delete();
        return redirect()->route('admin.guides.index')->with('success', 'Tour deleted successfully');
    }
}