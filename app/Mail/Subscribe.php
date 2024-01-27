<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservasi;
use App\Models\Gedung;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $order_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $order_id)
    {
        $this->email = $email;
        $this->order_id = $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = Reservasi::where('kode', $this->order_id)->first();
        $product = Gedung::where('id', $order->id_gedung)->first();
        return $this
        ->subject('Konfirmasi pemesanan gedung ' . $order->kode)
        ->markdown('emails.booking', [
            'name' => $order->name,
            'detail' => $order,
            'product' => $product,
            'kode' => $order->kode,
            'url' => url('order?kode=' . $order->kode),
        ]);
    }
}
