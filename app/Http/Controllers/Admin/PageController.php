<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        $categories = Category::count();
        $package = Package::count();
        $payments = Payment::count();
        $users = User::count();
        $orders = Order::count();
        return view('admin.dashboard', compact('categories', 'payments', 'package', 'users', 'orders'));
    }
}