<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Midtrans\Notification;
use Midtrans\Config;

class CallbackController extends Controller
{
    public function callback_midtrans(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        $notif = new Notification();

        // $bank = array_values($notif->va_numbers)[0];
        // if ($bank->bank == 'bri') {
        // }

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        error_log("Order ID $notif->order_id: " . "transaction status = $transaction, fraud staus = $fraud");
        //status = 0:waiting, 1:sukses, 2:processing, 3:cancel, 4:expired, 5:waiting payment
        if ($transaction == 'pending') {
            Reservasi::where('kode', $notif->order_id)->update(['status' => 5]);
        } else if ($transaction == 'settlement') {
            Reservasi::where('kode', $notif->order_id)->update(['status' => 1]);
        } else if ($transaction == 'cancel') {
            Reservasi::where('kode', $notif->order_id)->update(['status' => 3]);
        } else if ($transaction == 'deny') {
            Reservasi::where('kode', $notif->order_id)->update(['status' => 3]);
        } else if ($transaction == 'expire') {
            Reservasi::where('kode', $notif->order_id)->update(['status' => 4]);
        }
    }
}
