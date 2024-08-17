@extends('user.master')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero mt-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5" id="noProduct" @if ($totalQuantity !== 0) style="display: none;" @endif>
                <p>No packages found.</p>
            </div>
            <div class="row mb-5" id="product" @if ($totalQuantity == 0) style="display: none;" @endif>
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Package</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $c)
                                    <tr data-product-id="{{ $c->package->id }}">
                                        <td class="product-thumbnail">
                                            <img alt="{{ $c->package->name }}" class="img-fluid"
                                                src="{{ asset('images/packages/' . $c->package->image) }}">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $c->package->name }}</h2>
                                        </td>
                                        <td>MMK {{ $c->package->price }}</td>
                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease" type="button"
                                                        onclick="decreaseQuantity({{ $c->package_id }})">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity-amount"
                                                    value="{{ $c->quantity }}" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-black increase" type="button"
                                                        onclick="increaseQuantity({{ $c->package_id }})">&plus;</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-total">MMK
                                            {{ number_format($c->package->price * $c->quantity, 2) }}</td>
                                        <td><button class="btn btn-black btn-sm" type="button"
                                                onclick="removeCartItem({{ $c->package->id }})">X</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a class="button px-3" href="{{ url('/tours') }}">Continue Booking<i
                                    class="fa fa-plane" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5" id="cartTotals" @if ($totalQuantity == 0) style="display: none;" @endif>
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Total Quantity</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black" id="TotalQuantity">{{ $totalQuantity ?? 0 }}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black" id="cartTotalPrice">MMK
                                        {{ number_format($totalPrice, 2) }}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="button px-3" href="{{ url('/checkout') }}">Proceed To Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function increaseQuantity(packageId) {
            axios.post(`/update-quantity/${packageId}/increase`)
                .then(response => {
                    updateQuantityDisplay(packageId, response.data.quantity);
                    updateTotalPrice(response.data.totalPrice);
                    updateProductTotal(packageId, response.data.packagePrice, response.data.quantity);
                    updateTotalQuantity(response.data.totalQuantity);
                })
                .catch(error => {
                    console.error('Error increasing quantity:', error);
                });
        }

        function decreaseQuantity(packageId) {
            axios.post(`/update-quantity/${packageId}/decrease`)
                .then(response => {
                    if (response.data.quantity === 0) {
                        removeCartItem(packageId);
                    } else {
                        updateQuantityDisplay(packageId, response.data.quantity);
                        updateTotalPrice(response.data.totalPrice);
                        updateProductTotal(packageId, response.data.packagePrice, response.data.quantity);
                        updateTotalQuantity(response.data.totalQuantity);
                    }
                })
                .catch(error => {
                    console.error('Error decreasing quantity:', error);
                });
        }

        function removeCartItem(packageId) {
            axios.post(`/update-quantity/${packageId}/remove`)
                .then(response => {
                    let rowToRemove = document.querySelector(`tr[data-product-id="${packageId}"]`);
                    if (rowToRemove) {
                        rowToRemove.remove();
                    }
                    updateTotalQuantity(response.data.totalQuantity);
                    updateTotalPrice(response.data.totalPrice);
                })
                .catch(error => {
                    console.error('Error removing item:', error);
                });
        }

        function updateQuantityDisplay(packageId, quantity) {
            let inputField = document.querySelector(`tr[data-product-id="${packageId}"] .quantity-amount`);
            if (inputField) {
                inputField.value = quantity;
            }
        }

        function updateProductTotal(packageId, packagePrice, quantity) {
            let total = packagePrice * quantity;
            let productTotalCell = document.querySelector(`tr[data-product-id="${packageId}"] .product-total`);
            if (productTotalCell) {
                productTotalCell.textContent = `MMK ${total.toFixed(2)}`;
            }
        }

        function updateTotalQuantity(totalQuantity) {
            document.getElementById('TotalQuantity').textContent = totalQuantity;
            document.getElementById('cartTotalQuantity').textContent = totalQuantity;

            let cartTotalsDiv = document.getElementById('cartTotals');
            let noProductDiv = document.getElementById('noProduct');
            let productDiv = document.getElementById('product');

            if (totalQuantity > 0) {
                cartTotalsDiv.style.display = 'block';
                noProductDiv.style.display = 'none';
                productDiv.style.display = 'block';
            } else {
                cartTotalsDiv.style.display = 'none';
                noProductDiv.style.display = 'block';
                productDiv.style.display = 'none';
            }
        }

        function updateTotalPrice(totalPrice) {
            document.getElementById('cartTotalPrice').textContent = `MMK ${totalPrice.toFixed(2)}`;
        }
    </script>
@endsection
