<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user', 'payment')->latest()->get();

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
        // Return the orders with attached products
        // return $orders;
        return view('admin.orders.index', compact('orders'));
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
        //
    }
    public function updateStatus(Request $request)
    {
        // Find the order by its ID
        $order = Order::find($request->id);

        // Extract the package IDs from the order
        $packageIds = json_decode($order->package_ids, true);

        // Increase the tour count for each package
        foreach ($packageIds as $packageId) {
            $package = Package::find($packageId);
            if ($package) {
                $package->tour_count += 1; // Increase the tour count by 1
                $package->save();
            }
        }

        // Update the order status
        $order->status = $request->status;
        $order->save();

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
}
