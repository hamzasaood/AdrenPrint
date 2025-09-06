<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f5f5f5; text-align: left; }
        .totals td { border: none; }
        .totals tr th { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Invoice</h2>
        <p>Order #{{ $order->id }} | {{ $order->created_at->format('d M Y') }}</p>
    </div>

    <h4>Billing Info</h4>
    <p>
        {{ $order->billing_name }} <br>
        {{ $order->billing_email }} <br>
        {{ $order->billing_phone }} <br>
        {{ $order->billing_address }}
    </p>

    <h4>Order Items</h4>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->design_name ?? $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="totals" style="width: 100%;">
        <tr>
            <th>Subtotal:</th>
            <td>${{ number_format($order->items->sum(fn($i)=>$i->price * $i->quantity), 2) }}</td>
        </tr>
        <tr>
            <th>Shipping:</th>
            <td>${{ number_format($order->shipping_cost ?? 0, 2) }}</td>
        </tr>
        <tr>
            <th>Total:</th>
            <td><strong>${{ number_format($order->total, 2) }}</strong></td>
        </tr>
    </table>

    <p style="text-align:center; margin-top:30px;">Thank you for shopping with us!</p>
</body>
</html>
