<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Package;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $userId = Auth::id(); // This will return null if the user is not authenticated

        if ($userId) {
            $cart = Cart::where('user_id', $userId)->get();
            $totalQuantity = $cart->sum('quantity');
        } else {
            $cart = collect(); // Empty collection
            $totalQuantity = 0;
        }

        $categories = Category::with('packages')->paginate(8);
        $packages = Package::with('category', 'tag')->paginate(12);


        return view('user.home', compact('packages', 'categories', 'totalQuantity'));
    }

    public function about()
    {
        $userId = Auth::id(); // This will return null if the user is not authenticated

        if ($userId) {
            $cart = Cart::where('user_id', $userId)->get();
            $totalQuantity = $cart->sum('quantity');
        } else {
            $cart = collect(); // Empty collection
            $totalQuantity = 0;
        }
        $tours = Tour::paginate(8);
        return view('user.about', compact('tours', 'totalQuantity'));
    }
    public function contact()
    {
        $userId = Auth::id(); // This will return null if the user is not authenticated

        if ($userId) {
            $cart = Cart::where('user_id', $userId)->get();
            $totalQuantity = $cart->sum('quantity');
        } else {
            $cart = collect(); // Empty collection
            $totalQuantity = 0;
        }
        return view('user.contact', compact('totalQuantity'));
    }
    public function tours()
    {
        $userId = Auth::id(); // This will return null if the user is not authenticated

        if ($userId) {
            $cart = Cart::where('user_id', $userId)->get();
            $totalQuantity = $cart->sum('quantity');
        } else {
            $cart = collect(); // Empty collection
            $totalQuantity = 0;
        }
        $packages = Package::with('category', 'tag')->paginate(9);
        $categories = Category::all();
        return view('user.tours', compact('packages', 'categories', 'totalQuantity'));
    }
    
    public function destination()
    {
        $userId = Auth::id(); // This will return null if the user is not authenticated

        if ($userId) {
            $cart = Cart::where('user_id', $userId)->get();
            $totalQuantity = $cart->sum('quantity');
        } else {
            $cart = collect(); // Empty collection
            $totalQuantity = 0;
        }
        $categories = Category::with('packages')->paginate(12);
        return view('user.categories', compact('categories', 'totalQuantity'));
    }
}
