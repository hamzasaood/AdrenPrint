@extends('layout.default')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0">
        {{-- Invoice Header --}}
        <div class="card-header text-white d-flex justify-content-between align-items-center" 
             style="background:linear-gradient(90deg, #dea928, #000201);">
            <div>
                <h3 class="mb-0">Invoice</h3>
                <small>Order #{{ $order->id }}</small>
            </div>
            <div class="text-end">
                <h5 class="mb-0">Ardens Print</h5>
                <small class="d-block">16131 N Eldridge Pkwy, Suite 108, Tomball, TX 77377</small>
                <small class="d-block">info@ardensprint.com</small>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('order.invoice.download', $order->id) }}" 
                class="btn btn-outline-success">
                <i class="fas fa-download"></i> Download Invoice
                </a>
            </div>

        </div>

        {{-- Invoice Body --}}
        <div class="card-body p-5">
            {{-- Order Info --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="fw-bold">Order Info</h6>
                    <p class="mb-1"><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                    <p class="mb-1"><strong>Status:</strong> 
                        <span class="badge bg-{{ $order->payment_status=='paid' ? 'success':'warning' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </p>
                    <p class="mb-1"><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h6 class="fw-bold">Billing Information</h6>
                    <p class="mb-1"><strong>{{ $order->billing_name }}</strong></p>
                    <p class="mb-1">{{ $order->billing_email }}</p>
                    <p class="mb-1">{{ $order->billing_phone }}</p>
                    <p class="mb-1">{{ $order->billing_address }}</p>
                </div>
            </div>

            {{-- Items Table --}}
            <h6 class="fw-bold mb-3">Order Items</h6>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Item</th>
                            <th>Details</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Price</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                {{-- Item Name + Image --}}
                                <td>
                                    @if($item->design_id || !$item->product_id)
                                        <strong>{{ $item->design_name ?? 'Gangsheet Design' }}</strong>
                                        @if($item->preview)
                                            <br>
                                            <img src="{{ asset($item->preview) }}" alt="Preview" width="80" class="mt-2 rounded border">
                                        @endif
                                    @else
                                        <strong>{{ $item->product->name ?? 'Product' }}</strong>
                                        @if($item->product_image)
                                            <br>
                                            <img src="{{ asset($item->product_image) }}" alt="Product" width="80" class="mt-2 rounded border">
                                        @endif
                                    @endif
                                </td>

                                {{-- Item Details --}}
                                <td>
                                    @if($item->design_id || !$item->product_id)
                                        <p class="mb-1"><strong>Size:</strong> {{ $item->size_title }}</p>
                                        <p class="mb-1"><strong>Width:</strong> {{ $item->width }} in</p>
                                        <p class="mb-1"><strong>Height:</strong> {{ $item->height }} in</p>
                                        <p class="mb-1"><strong>Color:</strong> {{ $item->options }}</p>
                                    @else
                                        <p class="mb-1">Standard Product</p>
                                        <p class="mb-1"><strong>Size:</strong> {{ $item->size ?? 'N/A' }}</p>
                                        <p class="mb-1"><strong>Color:</strong> {{ $item->color ?? 'N/A' }}</p>
                                    @endif
                                </td>

                                {{-- Qty / Price --}}
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-end">${{ number_format($item->price, 2) }}</td>
                                <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Totals --}}
            <div class="row justify-content-end mt-4">
                <div class="col-md-5">
                    <table class="table table-sm">
                        <tr>
                            <th>Subtotal:</th>
                            <td class="text-end">
                                ${{ number_format($order->items->sum(fn($i)=>$i->price * $i->quantity), 2) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td class="text-end">${{ number_format($order->shipping_cost ?? 0, 2) }}</td>
                        </tr>
                        <tr class="fw-bold">
                            <th>Total:</th>
                            <td class="text-end">${{ number_format($order->total, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Footer --}}
            <div class="mt-5 text-center text-muted small">
                Thank you for shopping with us!  
                <br> This is a system-generated invoice and does not require a signature.
            </div>
        </div>
    </div>
</div>
@endsection
