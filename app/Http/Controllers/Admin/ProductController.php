<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::with('category', 'tag')->latest()->get();
        // return ($packages);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.packages.create', compact('categories', 'tags'));
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
            'name' => 'required|unique:packages',
            'price' => 'required',
            'time' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);
        if ($validation) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/packages'), $imageName);
                $validation['image'] = $imageName;
            }
            Package::create($validation);
            return redirect()->route('admin.packages.index')->with('success', 'Package Added Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        $package = Package::with('category')->find($package->id);
        return view('admin.packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $package = Package::with('category')->find($package->id);
        return view('admin.packages.edit', compact('package', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $validation = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);
        if ($validation) {
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($package->image && file_exists(public_path('/images/packages') . '/' . $package->image)) {
                    unlink(public_path('/images/packages') . '/' . $package->image);
                }

                $file = $request->file('image');
                $file_name = uniqid() . $file->getClientOriginalName();
                $file->move(public_path('/images/packages'), $file_name);

                $package->image = $file_name;
            }

            $package->update($request->except(['image']));

            return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully');
        } else {
            return redirect()->back()->with('error', 'Package update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        if ($package->image && file_exists(public_path('/images/packages') . '/' . $package->image)) {
            unlink(public_path('/images/packages') . '/' . $package->image);
        }
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully');
    }
}