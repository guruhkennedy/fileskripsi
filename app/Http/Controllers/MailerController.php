<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribe;

class MailerController extends Controller
{
    public static function sendMail($email, $order_id){
        Mail::to($email)->send(new Subscribe($email, $order_id));
    }
}
