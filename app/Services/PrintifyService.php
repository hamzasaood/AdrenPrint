<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PrintifyService
{
    protected $apiKey;
    protected $baseUrl = 'https://api.printify.com/v1';

    public function __construct()
    {
        $this->apiKey = config('services.printify.key'); // store in .env
    }

    /**
     * Create order in Printify
     */
    public function createOrder($order, $items)
    {
        $payload = [
            'external_id' => (string) $order->id,
            'label' => 'Laravel Shop Order #' . $order->id,
            'line_items' => [],
            'shipping_method' => 1, // 1 = Printify default standard
            'send_shipping_notification' => true,
            'address_to' => [
                'first_name' => $order->shipping_name,
                'last_name' => '',
                'email' => $order->shipping_email,
                'phone' => $order->shipping_phone,
                'country' => 'UK', // TODO: make dynamic
                'region' => '',
                'address1' => $order->shipping_address,
                'address2' => '',
                'city' => '',
                'zip' => $order->shipping_postal_code,
            ],
        ];

        foreach ($items as $item) {
            $payload['line_items'][] = [
                'product_id' => $item->printify_product_id ?? 'YOUR_DEFAULT_PRODUCT_ID',
                'variant_id' => $item->printify_variant_id ?? 'YOUR_DEFAULT_VARIANT_ID',
                'quantity'   => $item->quantity,
                // If you want to send custom artwork:
                'print_areas' => [
                    [
                        'placeholders' => [
                            [
                                'position' => 'front',
                                'images' => [
                                    [
                                        'src' => asset($item->gangsheet), // gangsheet URL
                                        'scale' => 1,
                                        'top' => 0,
                                        'left' => 0,
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];
        }

        $response = Http::withToken($this->apiKey)
            ->post($this->baseUrl . '/shops/' . config('services.printify.shop_id') . '/orders.json', $payload);

        $data = $response->json();

        // Save response in DB
        $order->update([
            'printify_order_id' => $data['id'] ?? null,
            'printify_status'   => $response->successful() ? 'sent' : 'failed',
            'printify_payload'  => json_encode($payload),
        ]);

        return $data;
    }
}
