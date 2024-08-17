<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function packageDetail($id)
    {
        $package = Package::find($id);
        if ($package) {
            $package->view_count += 1;
            $package->save();
            return response()->json(['success' => true, 'view_count' => $package->view_count]);
        }
        return response()->json(['success' => false]);
    }

    public function bookTrip($id, Request $request)
    {
        
        $existingCart = Cart::where('package_id', $id)
            ->where('user_id', auth()->guard('web')->user()->id)
            ->first();

        if ($existingCart) {
            $existingCart->increment('quantity');
        } else {
            $package = Package::where('id', $id)->first();
            $cart = new Cart();
            $cart->user_id = auth()->guard('web')->user()->id;
            $cart->package_id = $package->id;
            $cart->package_price = $package->price;
            $cart->quantity = 1;
            $cart->save();
        }
        return back()->with('success', 'Package Added Successfully');
    }

    public function cart()
    {
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get();
        $totalQuantity = $cart->sum('quantity');
        $totalPrice = $cart->reduce(function ($carry, $item) {
            return $carry + ($item->quantity * $item->package->price);
        }, 0);
        return view('user.cart', compact('cart', 'totalQuantity', 'totalPrice'));
    }

    public function increaseQuantity($packageId)
    {
        $user = Auth::user();;
        $cartItem = Cart::where('user_id', $user->id)
            ->where('package_id', $packageId)
            ->first();
        if (!$cartItem) {
            return response()->json(['error' => 'Item not found in cart.'], 404);
        }
        $cartItem->quantity++;
        // decrease product quantity
        // Product::find($productId)->decrement('quantity');
        $packagePrice = Package::find($packageId)->price;
        $cartItem->save();
        $cartdata = Cart::where('user_id', $user->id)->get();
        $totalQuantity = $cartdata->sum('quantity');
        $totalPrice = $cartdata->reduce(function ($carry, $item) {
            return $carry + ($item->quantity * $item->package->price);
        }, 0);
        return response()->json(['success' => 'Quantity increased successfully.', 'quantity' => $cartItem->quantity, 'totalQuantity' => $totalQuantity, 'packagePrice' => $packagePrice, 'totalPrice' => $totalPrice], 200);
    }

    public function decreaseQuantity($packageId)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)
            ->where('package_id', $packageId)
            ->first();
        if (!$cartItem) {
            return response()->json(['error' => 'Item not found in cart.'], 404);
        }
        $cartItem->quantity--;
        $packagePrice = Package::find($packageId)->price;
        $cartItem->save();
        $cartdata = Cart::where('user_id', $user->id)->get();
        $totalQuantity = $cartdata->sum('quantity');
        $totalPrice = $cartdata->reduce(function ($carry, $item) {
            return $carry + ($item->quantity * $item->package->price);
        }, 0);
        return response()->json(['success' => 'Quantity increased successfully.', 'quantity' => $cartItem->quantity, 'totalQuantity' => $totalQuantity, 'packagePrice' => $packagePrice, 'totalPrice' => $totalPrice], 200);
    }
    public function removeItem($packageId)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)
            ->where('package_id', $packageId)
            ->first();
        if (!$cartItem) {
            return response()->json(['error' => 'Item not found in cart.'], 404);
        }
        // Get the quantity of the item being removed
        // $removedQuantity = $cartItem->quantity;
        // Delete the cart item
        $cartItem->delete();
        // Increment product quantity by the removed quantity
        // $product = Product::find($packageId);
        // $product->increment('quantity', $removedQuantity);
        // Retrieve updated cart data
        $cartData = Cart::where('user_id', $user->id)->get();
        $totalQuantity = $cartData->sum('quantity');
        $totalPrice = $cartData->reduce(function ($carry, $item) {
            return $carry + ($item->quantity * $item->package->price);
        }, 0);
        $carts = Cart::where('user_id', auth()->guard('web')->user()->id)->with('package', 'user')->get();
        return response()->json(['success' => 'Item removed successfully.', 'totalQuantity' => $totalQuantity, 'cart' => $carts, 'totalPrice' => $totalPrice], 200);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $packages = Package::with('tag')
            ->where('name', 'like', "%$query%")
            ->orWhere('price', 'like', "%$query%")
            ->orWhere('time', 'like', "%$query%")
            ->orWhereHas('tag', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->paginate(9);
        $categories = Category::all();
        $userId = Auth::id(); // This will return null if the user is not authenticated

        if ($userId) {
            $cart = Cart::where('user_id', $userId)->get();
            $totalQuantity = $cart->sum('quantity');
        } else {
            $cart = collect(); // Empty collection
            $totalQuantity = 0;
        }
        return view('user.tours', compact('packages', 'categories', 'totalQuantity'));
    }
    public function checkout(Request $request)
    {
        $cartdata = Cart::where('user_id', auth()->guard('web')->user()->id)->get();
        // Calculate total quantity in the cart
        $totalQuantity = $cartdata->sum('quantity');
        $carts = Cart::where('user_id', auth()->guard('web')->user()->id)->with('package', 'user')->get();
        // Calculate total price in the cart
        $totalPrice = $cartdata->reduce(function ($carry, $item) {
            return $carry + ($item->quantity * $item->package->price);
        }, 0);
        // return $totalPrice;
        $payments = Payment::all();
        return view('user.checkout', compact('payments', 'carts', 'totalQuantity', 'totalPrice'));
    }
    public function addOrder(Request $request)
    {
        // return $request->all();
        // Validate the request data
        $validatedData = $request->validate([
            'payment_id' => 'required',
            'total_qty' => 'required',
            'total_amt' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
            'capital' => 'required',
            'district' => 'required',
            'township' => 'required',
            'address' => 'required',
            'note' => 'nullable|string',
            'payment_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', 'package_ids' => 'required|array', // Ensure product_ids is required and an array
            'package_ids.*' => 'integer|exists:packages,id', // Validate each product_id as integer and exist in products table
            'package_prices' => 'required|array', // Ensure product_prices is required and an array
            'package_prices.*' => 'numeric|min:0', // Validate each product_price as numeric and non-negative
            'package_quantities' => 'required|array', // Ensure product_quantities is required and an array
            'package_quantities.*' => 'integer|min:1', // Validate each product_quantity as integer and at least 1
        ]);

        try {
            // Create a new order using the validated data
            $order = new Order();
            $order->user_id = auth()->guard('web')->user()->id;
            $order->order_no = strtoupper(uniqid('ORDER-'));
            $order->payment_id = $validatedData['payment_id'];
            $order->total_qty = $validatedData['total_qty'];
            $order->total_amt = $validatedData['total_amt'];
            $order->first_name = $validatedData['first_name'];
            $order->last_name = $validatedData['last_name'];
            $order->phone_no = $validatedData['phone_no'];
            $order->capital = $validatedData['capital'];
            $order->district = $validatedData['district'];
            $order->township = $validatedData['township'];
            $order->address = $validatedData['address'];
            $order->note = $validatedData['note'];
            $order->package_ids = json_encode($request->input('package_ids')); // Serialize product_ids array to JSON
            $order->package_prices = json_encode($request->input('package_prices')); // Serialize product_ids array to JSON
            $order->package_quantities = json_encode($request->input('package_quantities')); // Serialize product_ids array to JSON

            if ($request->hasFile('payment_image')) {
                $image = $request->file('payment_image');
                $imageName = $order->order_no . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/payment-screenshot'), $imageName);
                $order->payment_image =  $imageName;
            }

            $order->save();
            // Delete all cart items
            Cart::where('user_id', auth()->guard('web')->user()->id)->delete();
            // Redirect to the thank you page
            return redirect()->route('thanks')->with('success', 'Order placed successfully.');
        } catch (\Exception $e) {
            return ($e->getMessage());
            // Redirect back with an error message
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function thanks()
    {
        $cartdata = Cart::where('user_id', auth()->guard('web')->user()->id)->get();
        // Calculate total quantity in the cart
        $totalQuantity = $cartdata->sum('quantity');
        return view('user.thankyou', compact('totalQuantity'));
    }
}
