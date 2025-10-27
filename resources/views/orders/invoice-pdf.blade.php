<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
@php
$gradientSvg = '
<svg xmlns="http://www.w3.org/2000/svg" width="600" height="80">
  <defs>
    <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:#1f993d;stop-opacity:1"/>
      <stop offset="100%" style="stop-color:#28c76f;stop-opacity:1"/>
    </linearGradient>
  </defs>
  <rect width="600" height="80" fill="url(#grad)"/>
</svg>';
$gradientBase64 = base64_encode($gradientSvg);
@endphp

<style>
    body { font-family: DejaVu Sans, sans-serif; margin:0; padding:0; font-size:12px; color:#333; }
    .card { border:1px solid #ddd; border-radius:6px; overflow:hidden; }
    .card-header {
        background: #dea928; /* ✅ fallback solid color */
        background: url('data:image/svg+xml;base64,{{ $gradientBase64 }}') no-repeat, #dea928;
        background-size: cover;
        color:#fff;
        padding:20px;
        display:flex; 
        justify-content:space-between; 
        align-items:center;
    }
    .card-header h3 { margin:0; }
    .card-body { padding:30px; }
    h6 { margin:0 0 8px 0; font-size:14px; }
    table { width:100%; border-collapse:collapse; margin-top:15px; }
    table th, table td { border:1px solid #ddd; padding:8px; }
    table th { background:#f9f9f9; text-align:left; }
    .text-end { text-align:right; }
    .text-center { text-align:center; }
    .badge { display:inline-block; padding:3px 8px; border-radius:4px; font-size:11px; color:#fff; }
    .bg-success { background:#28a745; }
    .bg-warning { background:#ffc107; color:#000; }
    .footer { text-align:center; font-size:11px; color:#777; margin-top:40px; }
</style>


</head>
<body>
    <div class="card">
        {{-- Header --}}
        <div class="card-header">
            <div>
                <h3>Invoice</h3>
                <small>Order #{{ $order->id }}</small>
            </div>
            <div style="text-align:center;">
                <h5 style="margin:0;">Ardens Print</h5>
                <small>16131 N Eldridge Pkwy, Suite 108, Tomball, TX 77377</small><br>
                <small>info@ardensprint.com</small>
            </div>
        </div>

        {{-- Body --}}
        <div class="card-body">
            {{-- Order Info --}}
            <table style="margin-bottom:20px;">
                <tr>
                    <td width="50%">
                        <h6>Order Info</h6>
                        <p><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge {{ $order->payment_status=='paid' ? 'bg-success':'bg-warning' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </p>
                        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                    </td>
                    <td width="50%" style="text-align:right;">
                        <h6>Billing Information</h6>
                        <p><strong>{{ $order->billing_name }}</strong></p>
                        <p>{{ $order->billing_email }}</p>
                        <p>{{ $order->billing_phone }}</p>
                        <p>{{ $order->billing_address }}</p>
                    </td>
                </tr>
            </table>

            {{-- Items --}}
            <h6>Order Items</h6>
            <table>
                <thead>
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
                            <td>
                                @if($item->design_id || !$item->product_id)
                                    <strong>{{ $item->design_name ?? 'Gangsheet Design' }}</strong>
                                    
                                @else
                                    <strong>{{ $item->product->name ?? 'Product' }}</strong>
                                @endif
                            </td>
                            <td>
                                @if($item->design_id || !$item->product_id)
                                    Size: {{ $item->size_title }} <br>
                                    Width: {{ $item->width }} in <br>
                                    Height: {{ $item->height }} in
                                @else
                                    Standard Product <br>
                                    <p class="mb-1"><strong>Size:</strong> {{ $item->size ?? 'N/A' }}</p><br>
                                        <p class="mb-1"><strong>Color:</strong> {{ $item->color ?? 'N/A' }}</p>
                                @endif
                            </td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-end">${{ number_format($item->price, 2) }}</td>
                            <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Totals --}}
            <table style="margin-top:20px;">
                <tr>
                    <td width="70%" style="border:none;"></td>
                    <td width="30%" style="border:none;">
                        <table width="100%">
                            <tr>
                                <th style="width:50%;">Subtotal:</th>
                                <td class="text-end">
                                    ${{ number_format($order->items->sum(fn($i)=>$i->price * $i->quantity), 2) }}
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td class="text-end">${{ number_format($order->shipping_cost ?? 0, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td class="text-end"><strong>${{ number_format($order->total, 2) }}</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            {{-- Footer --}}
            <div class="footer">
                Thank you for shopping with us!<br>
                This is a system-generated invoice and does not require a signature.
            </div>
        </div>
    </div>
</body>
</html>
