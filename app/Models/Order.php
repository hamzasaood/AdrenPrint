<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id','billing_name', 'billing_email', 'billing_phone', 'billing_address', 'billing_postal_code',
        'shipping_name', 'shipping_email', 'shipping_phone', 'shipping_address', 'shipping_postal_code',
        'status', 'payment_status', 'total_amount', 'gang_sheet_file','subtotal','total','payment_method',
        'stripe_payment_id','shipping_cost','printify_order_id','printify_status','printify_payload'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
