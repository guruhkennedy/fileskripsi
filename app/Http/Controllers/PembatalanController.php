<?php

namespace App\Http\Controllers;

use App\Models\Pembatalan;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class PembatalanController extends Controller
{
    public  function index()
    {
        return view('pembatalan');
    }

    public function pembatalan(Request $request)
    {
        $this->validate(
            $request,
            [
                'kode' => 'required',
                'no_hp' => 'required|exists:reservasi,no_hp',
                'alasan' => 'required',
            ],
            [
                'kode.required' => 'Kode reservasi tidak boleh kosong',
                'no_hp.required' => 'Nomor handphone tidak boleh kosong',
                'no_hp.exists' => 'Nomor handphone tidak sama dengan nomor handphone yang terdaftar pada bookingan ini',
                'alasan.required' => 'Alasan pembatalan tidak boleh kosong',
            ]
        );

        $reservasi = Reservasi::where('kode', $request->kode)->first();

        if (!$reservasi) {
            return redirect()->back()->with('error', 'Kode reservasi tidak ditemukan');
        }

        if ($reservasi->status == 3) {
            return redirect()->back()->with('error', 'Bookingan ini sudah dibatalkan');
        }

        $pembatalan = Pembatalan::where('id_reservasi', $reservasi->id)->first();

        if ($pembatalan) {
            return redirect()->back()->with('error', 'Bookingan ini sudah diajukan pembatalan sebelumnya. Silahkan tunggu admin merespon');
        }

        Pembatalan::create([
            'id_reservasi' => $reservasi->id,
            'alasan' => $request->alasan,
            'status' => 0,
        ]);

        return redirect()->route('pembatalan-user')->with('success', 'Ticket pembatalan berhasil dibuat, silahkan tunggu admin merespon dan dikonfirmasi melalui WhatsApp');
    }
}
