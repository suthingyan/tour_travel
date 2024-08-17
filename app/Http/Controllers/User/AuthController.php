<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('user.login');
    }
    public function showregister()
    {
        return view('user.register');
    }
    public function Login(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        if (!$checkEmail) {
            return redirect()->back()->with('error', 'Email Not Found!');
        }
        $checkPassword = Hash::check($request->password, $checkEmail->password);
        if (!$checkPassword) {
            return redirect()->back()->with('error', 'Wrong Password');
        }
        auth()->login($checkEmail);
        return redirect('/')->with('success', 'Welcome ' . auth()->user()->name);
    }
    public function Register(Request $request)
    {


        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'email.unique' => 'Email already exists.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);

        // Try to create the user
        try {
            $createdUser = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
            auth()->login($createdUser);
            // Redirect with success message
            return redirect('/')->with('success', 'Welcome ' . auth()->user()->name);
        } catch (\Exception $e) {
            // Redirect with error message if creation fails
            return redirect()->back()
                ->with('error', 'User creation failed.');
        }
    }

    public function updateProfile($id, Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            // 'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validation) {
            $user = User::where('id', $id)->first();
            // $user->password = $user->password;
            if ($request->hasFile('image')) {
                if ($user->image && file_exists(public_path('/images/users') . '/' . $user->image)) {
                    unlink(public_path('/images/users') . '/' . $user->image);
                }
                $file = $request->file('image');
                $file_name = uniqid() . $file->getClientOriginalName();
                $file->move(public_path('/images/users'), $file_name);
                $user->image = $file_name;
            }
            $user->update($request->except(['image']));
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Profile update failed');
        }
    }

    public function changePwd($id, Request $request)
    {
        $request->validate([
            'old_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);
        $user = User::where('id', $id)->first();
        if ($request->filled('old_password')) {
            if (Hash::check($request->input('old_password'), $user->password)) {
                if ($request->filled('new_password')) {
                    $user->password = Hash::make($request->input('new_password'));
                } else {
                    return redirect()->route('userProfile')->withErrors(['new_password' => 'New password is required']);
                }
            } else {
                return redirect()->back()->withErrors(['new_password' => 'Old Password is incorrect']);
            }
        }
        $user->save();
        Auth::logout();
        return redirect('/login')->with('success', 'Password change successfully. Please login with new password');
    }

    public function userProfile()
    {
        $orders = Order::where('user_id', auth()->user()->id)->with('user', 'payment')->get();

        // Loop through each order to attach products based on package_ids
        $orders->each(function ($order) {
            // Decode the JSON string to retrieve package_ids array
            $productIds = json_decode($order->package_ids);

            // Fetch products based on package_ids
            $products = Package::whereIn('id', $productIds)->get();

            // Attach products to the order model
            $order->package_ids = $products;
        });
        $orders->each(function ($order) {
            // Decode the JSON string to retrieve package_prices and package_quantities arrays
            $order->package_prices = json_decode($order->package_prices);
            $order->package_quantities = json_decode($order->package_quantities);
        });
        $cartdata = Cart::where('user_id', auth()->guard('web')->user()->id)->get();
        // Calculate total quantity in the cart
        $totalQuantity = $cartdata->sum('quantity');
        return view('user.userProfile', compact('orders', 'totalQuantity'));
        // $userId = Auth::user()->id;
        // $cart = Cart::where('user_id', $userId)->get();
        // $totalQuantity = $cart->sum('quantity');
        // return view('user.userProfile', compact('cart', 'totalQuantity'));
    }

    public function Logout()
    {
        auth()->logout();
        return redirect('/');
    }
}