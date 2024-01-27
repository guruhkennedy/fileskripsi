<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembatalan;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class PembatalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pembatalans = Pembatalan::join('reservasi', 'pembatalan.id_reservasi', '=', 'reservasi.id')
            ->select('pembatalan.*', 'reservasi.kode as kode', 'reservasi.tanggal as tanggal', 'reservasi.status as status_reservasi')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('reservasi.kode', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('admin.pembatalan.index', compact('pembatalans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function terima(Request $request, Pembatalan $pembatalan)
    {
        $pembatalan->update([
            'status' => 1
        ]);
        Reservasi::where('id', $pembatalan->id_reservasi)->update([
            'status' => 3
        ]);
        $reservasi = Reservasi::where('id', $pembatalan->id_reservasi)->first();
        $pesan = 'Pembatalan reservasi dengan kode $_KODE_$ atas nama $_NAMA_$ telah disetujui, silahkan cek link berikut untuk melihat detail reservasi anda: $_LINK_$';
        $pesan = str_replace('$_KODE_$', $reservasi->kode, $pesan);
        $pesan = str_replace('$_LINK_$', url('order?kode=' . $reservasi->kode), $pesan);
        $pesan = str_replace('$_NAMA_$', $reservasi->nama, $pesan);
        ReservasiController::sendWhatsapp($reservasi->no_hp, $pesan);
        return redirect()->route('pembatalan.index')->with('success', 'Pembatalan Reservasi Berhasil Diterima');
    }

    public function tolak(Request $request, Pembatalan $pembatalan)
    {
        $pembatalan->update([
            'status' => 2
        ]);
        return redirect()->route('pembatalan.index')->with('success', 'Pembatalan Reservasi Berhasil Ditolak');
    }
}
