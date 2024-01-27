<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function index_api()
    {
        $rekening = Rekening::select('rekening.*', 'bank.nama', 'bank.logo')->where('rekening.status', 'Aktif')->join('bank', 'rekening.id_bank', '=', 'bank.id')->get();
        return response()->json($rekening);
    }
}
