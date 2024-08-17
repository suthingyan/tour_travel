@extends('admin.layouts.master')
@section('title', 'Orders')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Orders</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <!-- Table with stripped rows -->
                                        <table class="table display" style="width:100%" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th> No </th>
                                                    <th> Order Number </th>
                                                    <th> Order Date </th>
                                                    <th> User Name </th>
                                                    <th> Phone Number </th>
                                                    <th> Capital </th>
                                                    <th> District </th>
                                                    <th> Township </th>
                                                    <th> Address </th>
                                                    <th> Payment Image </th>
                                                    <th> Payment Type </th>
                                                    <th> Payment Owner Name </th>
                                                    <th> Payment Phone Number </th>
                                                    <th> Note </th>
                                                    <th> Status </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $o)
                                                    <tr class="align-middle">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $o->order_no }}</td>
                                                        <td>{{ $o->created_at->format('Y-m-d H:i:s') }}</td>
                                                        <td> {{ $o->first_name }} {{ $o->last_name }}
                                                        </td>
                                                        <td>{{ $o->phone_no }} </td>
                                                        <td>{{ $o->capital }} </td>
                                                        <td>{{ $o->district }}</td>
                                                        <td>{{ $o->township }}</td>
                                                        <td>{{ $o->address }}</td>
                                                        <td>
                                                            <img alt="{{ $o->payment->payment_name }}"
                                                                class="image-thumbnail w-100"
                                                                src="{{ asset('images/payment-screenshot/' . $o->payment_image) }}">
                                                        </td>
                                                        <td>{{ $o->payment->payment_name }}</td>
                                                        <td>{{ $o->payment->owner_name }}</td>
                                                        <td>{{ $o->payment->phone_no }}</td>
                                                        <td>{{ $o->note }}</td>
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="flexSwitchCheckDefault-{{ $o->id }}"
                                                                    @if ($o->status == 'Approved') checked disabled @endif
                                                                    onchange="updateStatus({{ $o->id }}, this.checked)">
                                                                <label class="form-check-label"
                                                                    for="flexSwitchCheckDefault-{{ $o->id }}"
                                                                    id="statusLabel-{{ $o->id }}"
                                                                    @if ($o->status == 'Approved') style="color: grey;" @endif>{{ $o->status }}</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#modalOrder-{{ $o->id }}"
                                                                {{-- data-bs-target="#modalDialogScrollable" --}}
                                                                class="btn mb-1 btn-sm btn-primary">Show</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
    @foreach ($orders as $o)
        <div class="modal fade" id="modalOrder-{{ $o->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fw-bold modal-title">{{ $o->order_no }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img alt="{{ $o->payment->payment_name }}" class="image-thumbnail w-100"
                            src="{{ asset('images/payment-screenshot/' . $o->payment_image) }}">

                        <table class="table site-block-order-table mb-5 text-center">
                            <thead>
                                <th>Product</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @foreach ($o->package_ids as $index => $product)
                                            {{ $product->name }} <strong
                                                class="mx-2">x</strong>{{ $o->package_quantities[$index] }}
                                            @if ($index < count($o->package_ids) - 1)
                                                <hr>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($o->package_ids as $index => $product)
                                            MMK {{ number_format($o->package_prices[$index], 2) }}
                                            @if ($index < count($o->package_ids) - 1)
                                                <hr>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                    <td class="text-black font-weight-bold"><strong>MMK
                                            {{ $o->total_amt }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        function updateStatus(id, status) {
            axios.post('/admin/orders/update-status', {
                    id: id,
                    status: status ? 'Approved' : 'Pending'
                })
                .then(response => {
                    if (response.data.success) {
                        console.log('Status updated successfully');
                        $('#successAlert').fadeIn().delay(3000).fadeOut(); // Show for 3 seconds

                        // Update the UI: Toggle the checked state based on the server response
                        document.getElementById('flexSwitchCheckDefault-' + id).checked = status;
                        let statusLabel = document.getElementById('statusLabel-' + id);
                        statusLabel.textContent = status ? 'Approved' : 'Pending';
                        // Disable checkbox if status is 'Approved'
                        if (status) {
                            document.getElementById('flexSwitchCheckDefault-' + id).setAttribute('disabled',
                                'disabled');
                            document.getElementById('statusLabel-' + id).style.color =
                                'grey'; // Optionally gray out the label
                        } else {
                            document.getElementById('flexSwitchCheckDefault-' + id).removeAttribute('disabled');
                            document.getElementById('statusLabel-' + id).style.color =
                                ''; // Optionally reset label color
                        }
                    } else {
                        console.error('Error updating status:', response.data.message);
                        // Optionally, show an error message to the user
                    }
                })
                .catch(error => {
                    console.error('There was an error updating the status!', error);
                    // Optionally, show an error message to the user
                });
        }
    </script>
@endsection
