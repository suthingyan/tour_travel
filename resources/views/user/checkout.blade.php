@extends('user.master')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero mt-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section">
        <div class="container">
            <form action="{{ url('order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border bg-white" style="border-radius: 10px;">
                            <div class="form-group mb-3">
                                <label for="payment_id" class="text-black">Payment <span
                                        class="text-danger">*</span></label>
                                <select name="payment_id" id="payment_id" class="form-control">
                                    <option value="">Select a Payment Type</option>
                                    @foreach ($payments as $p)
                                        <option value="{{ $p->id }}" data-phone="{{ $p->phone_no }}"
                                            data-owner_name="{{ $p->owner_name }}">
                                            {{ $p->payment_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group  mb-3 row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Payment Screenshot <span
                                            class="text-danger">*</span></label>
                                    <div id="payment_info" class="fw-bold text-success mb-2"></div>
                                    <input name="payment_image" type="file"
                                        accept="image/jpeg,image/png,image/jpg,image/gif" class="form-control"
                                        id="payment_image" name="payment_image">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="last_name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="address"
                                        placeholder="Address details">
                                </div>
                            </div>
                            <input type="text" name="total_qty" id="" hidden value="{{ $totalQuantity }}">
                            <input type="text" name="total_amt" id="" hidden value="{{ $totalPrice }}">
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="c_state_country" class="text-black">Capital <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_state_country" name="capital">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">District<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="district">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Township<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="township">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="phone_no"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="note" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border bg-white" style="border-radius: 10px;">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Package</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $c)
                                                <input type="hidden" name="package_ids[]" value="{{ $c->package->id }}">
                                                <input type="hidden" name="package_prices[]"
                                                    value="{{ $c->package_price }}">
                                                <input type="hidden" name="package_quantities[]"
                                                    value="{{ $c->quantity }}">
                                                <tr>
                                                    <td>{{ $c->package->name }} <strong class="mx-2">x</strong>
                                                        {{ $c->quantity }}</td>
                                                    <td>MMK {{ number_format($c->package_price * $c->quantity, 2) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                                <td class="text-black font-weight-bold"><strong>MMK
                                                        {{ number_format($totalPrice, 2) }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <button class="button px-3" style="border: unset" type="submit">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentSelect = document.getElementById('payment_id');
            const paymentInfo = document.getElementById('payment_info');

            paymentSelect.addEventListener('change', function() {
                const selectedOption = paymentSelect.options[paymentSelect.selectedIndex];
                const phoneNo = selectedOption.getAttribute('data-phone');
                const ownerName = selectedOption.getAttribute('data-owner_name');

                if (phoneNo && ownerName) {
                    paymentInfo.innerHTML = `Phone: ${phoneNo} <br> Owner Name: ${ownerName}`;
                } else {
                    paymentInfo.innerHTML = '';
                }
            });
        });
    </script>
@endsection
