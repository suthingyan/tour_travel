<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ], [
            'email.unique' => 'Email already exists.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);

        if ($validatedData) {
            // Create user if validation passes
            Admin::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
            // Redirect with success message
            return redirect()->route('admin.admins.index')
                ->with('success', 'Admin created successfully.');
        } else {
            // Redirect with error message
            return redirect()->route('admin.admins.create')
                ->with('error', 'Admin creation failed.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.admins.show', compact('admin'));
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
        $user = Admin::findOrFail($id);

        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('admins')->ignore($user->id),
            ],
            'old_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example rules for image upload
        ], [
            'email.unique' => 'Email already exists.',
            'old_password.min' => 'Password must be at least 8 characters long.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Passwords do not match.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPEG, PNG, JPG, and GIF files are allowed.',
            'image.max' => 'Maximum file size allowed is 2MB.',
        ]);

        // Update password if provided and old password matches
        if ($request->filled('password') && Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
        } elseif ($request->filled('password')) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        // Update name and email
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && file_exists(public_path('/images/admins') . '/' . $user->image)) {
                unlink(public_path('/images/admins') . '/' . $user->image);
            }

            $file = $request->file('image');
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images/admins'), $file_name);

            $user->image = $file_name;
        }

        $user->update($request->except(['image']));
        // if ($request->hasFile('image')) {
        //     // Delete old image if exists
        //     if ($user->image && Storage::exists('/images/admins/' . $user->image)) {
        //         Storage::delete('/images/admins/' . $user->image);
        //     }

        //     // Store new image
        //     $file = $request->file('image');
        //     $file_name = uniqid() . '_' . $file->getClientOriginalName();
        //     $file->storeAs('public/images/admins', $file_name);

        //     // Update user's image field
        //     $user->image = $file_name;
        //     $user->save();
        // }

        // Logout if password was updated
        if ($request->filled('password')) {
            Auth::logout();
            return redirect('/admin/login')->with('success', 'Profile updated successfully. Please login again.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully');
    }
    public function showProfile(Admin $admin)
    {
        return view('admin.admins.profile', compact('admin'));
    }
}