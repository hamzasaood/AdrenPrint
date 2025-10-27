@extends('admin.layout.default')

@section('admin.content')
<div class="container-fluid p-4">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">

            {{-- Invoice Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Invoice</h2>
                    <p class="text-muted mb-0">Order #{{ $order->id }}</p>
                    <p class="text-muted">Date: {{ $order->created_at->format('M d, Y') }}</p>
                </div>
                <div class="text-end">
                    <h4 class="fw-bold mb-0">Arden’s Print</h4>
                    <p class="mb-0">16131 N Eldridge Pkwy, Suite 108, Tomball, TX 77377</p>
                    <p class="mb-0">TOMBALL, TX</p>
                    <p class="mb-0">info@ardensprint.com</p>
                </div>
            </div>

            <hr>

            {{-- Customer & Shipping --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="fw-bold">Billing Details</h5>
                    <p class="mb-1"><strong>Name:</strong> {{ $order->billing_name }}</p>
                    <p class="mb-1"><strong>Email:</strong> {{ $order->billing_email }}</p>
                    <p class="mb-1"><strong>Phone:</strong> {{ $order->billing_phone }}</p>
                    <p class="mb-1"><strong>Address:</strong> {{ $order->billing_address }}, {{ $order->billing_postal_code }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold">Shipping Details</h5>
                    <p class="mb-1"><strong>Name:</strong> {{ $order->shipping_name ? $order->shipping_name : $order->billing_name }}</p>
                    <p class="mb-1"><strong>Email:</strong> {{ $order->shipping_email ? $order->shipping_email : $order->billing_email }}</p>
                    <p class="mb-1"><strong>Phone:</strong> {{ $order->shipping_phone ? $order->shipping_phone : $order->billing_phone }}</p>
                    <p class="mb-1"><strong>Address:</strong> {{ $order->shipping_address ? $order->shipping_address : $order->billing_address }}, {{ $order->shipping_postal_code ? $order->shipping_postal_code : $order->billing_postal_code }}</p>
                </div>
            </div>

            <hr>

            {{-- Order Summary --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Payment:</strong> {{ ucfirst($order->payment_status) }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                </div>
            </div>

            {{-- Items --}}
            <h5 class="fw-bold mb-3">Order Items</h5>
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Preview</th>
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
                            <td>
                                @if($item->design_id || !$item->product_id)

                                    @if(Str::endsWith($item->preview, '.pdf'))
                                    <label style="cursor:pointer;" onclick="openModal('{{ asset($item->preview) }}')">View PDF</label>
                                
                                    @else

                                    <img src="{{ $item->preview ? asset($item->preview) : asset('assets/media/products/nav-image-1.png') }}" 
                                         alt="Preview" width="80" class="rounded border" style="cursor:pointer;" onclick="openModal('{{ asset($item->preview) }}')">

                                    @endif


                                @else
                                    @php
                                       // use Illuminate\Support\Str;
                                    @endphp

                                    @if(Str::startsWith($item->product_image, 'https://www.ssactivewear.com'))
                                        <img src="{{ $item->product_image }}" alt="Product" width="80" class="rounded border">
                                    @else
                                        @if(Str::startsWith($item->product_image, 'pods/'))
                                        <img src="{{ asset($item->product_image) }}" alt="Product" width="80" class="rounded border">
                                        @else
                                        <img src="{{ asset('images/' . $item->product_image) }}" alt="Product" width="80" class="rounded border">
                                        @endif
                                    @endif


                                    
                                @endif
                            </td>
                            <td>
                                @if($item->design_id || !$item->product_id)
                                    <strong>{{ $item->design_name ?? 'Gangsheet Design' }}</strong>
                                @else
                                    <strong>{{ $item->product->name ?? 'Deleted Product' }}</strong>
                                @endif
                            </td>
                            <td>
                                @if($item->design_id || !$item->product_id)
                                    <p class="mb-1"><strong>Size:</strong> {{ $item->size_title }}</p>
                                    <p class="mb-1"><strong>Width:</strong> {{ $item->width }} in</p>
                                    <p class="mb-1"><strong>Height:</strong> {{ $item->height }} in</p>
                                @else
                                    <p class="mb-1"><strong>Size:</strong> {{ $item->size ?? 'N/A' }}</p>
                                    <p class="mb-1"><strong>Color:</strong> {{ $item->color ?? 'N/A' }}</p>
                                @endif
                            </td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-end">${{ number_format($item->price, 2) }}</td>
                            <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>

                            <td class="text-end">
                                <a href="{{ route('admin.order.download.item', [$order->id, $item->id]) }}" class="btn btn-sm btn-primary mb-1">
                                    Download Image
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Totals --}}
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <table class="table table-sm">
                        <tr>
                            <th>Subtotal:</th>
                            <td class="text-end">${{ number_format($order->items->sum(fn($i)=>$i->price * $i->quantity), 2) }}</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td class="text-end">${{ number_format($order->shipping_cost, 2) }}</td>
                        </tr>
                        <tr class="fw-bold">
                            <th>Total:</th>
                            <td class="text-end">${{ number_format($order->total, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            {{-- Actions --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('admin.orders.destroy',$order->id) }}" method="POST" onsubmit="return confirm('Delete this order?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Order</button>
                </form>

               @foreach($order->items as $item)
    
@endforeach

            </div>

        </div>
    </div>
</div>


<script>
                        function openModal(fileUrl) {
                                        var pdfWindow = window.open("");
                                        pdfWindow.document.write("<iframe width='100%' height='100%' src='" + fileUrl + "'></iframe>");
                                    }
                                </script>
@endsection
