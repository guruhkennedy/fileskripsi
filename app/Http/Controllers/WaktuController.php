<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaktuController extends Controller
{
    public static function getJam()
    {
        //ubah jam nya disini euy ^^
        $jam = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'];
        return ResponseController::response(true, 'Sukses', $jam);
    }
}
