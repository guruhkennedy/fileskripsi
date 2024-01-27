<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function getMeja()
    {
        $meja = Meja::all();
        return ResponseController::response(true, 'Sukses', $meja);
    }
}
