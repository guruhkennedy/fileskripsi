<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order, $product)
    {
        parent::__construct();

        $this->order = $order;
        $this->product = $product;
        $this->customer = $order;
    }

    public function getSnapToken()
    {
        // var_dump($this->order);
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->kode,
                'gross_amount' => (int)$this->order->total,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => (int)$this->product->harga,
                    'quantity' => 1,
                    'name' => $this->product->nama,
                ],
            ],
            'customer_details' => [
                'first_name' => $this->customer->nama,
                'email' => $this->customer->email,
                'phone' => $this->customer->no_hp,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
