<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->get();
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'payment_name' => 'required|max:255',
            'phone_no' => 'required|max:255',
            'owner_name' => 'required|max:255',
        ]);
        if ($validation) {
            $payment = new Payment();
            $payment->payment_name = $request->payment_name;
            $payment->phone_no = $request->phone_no;
            $payment->owner_name = $request->owner_name;
            $payment->save();
            return redirect()->route('admin.payments.index')->with('success', 'Payment Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Payment creation failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $validation = $request->validate([
            'payment_name' => 'required|max:255',
            'phone_no' => 'required|max:255',
            'owner_name' => 'required|max:255',
        ]);
        if ($validation) {
            $payment->payment_name = $request->payment_name;
            $payment->phone_no = $request->phone_no;
            $payment->owner_name = $request->owner_name;
            $payment->save();
            return redirect()->route('admin.payments.index')->with('success', 'Payment Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Payment updation failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('success', 'Payment Deleted Successfully');
    }
}
