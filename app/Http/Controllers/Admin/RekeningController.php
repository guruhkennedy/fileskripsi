<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rekenings = Rekening::select('rekening.*', 'bank.nama')
            ->join('bank', 'rekening.id_bank', '=', 'bank.id')
            ->when($request->input('name'), function ($rekenings, $name) {
                $rekenings = $rekenings->where('rekening.no_rekening', 'like', '%' . $name . '%');
            })->paginate(10);
        return view('admin.rekening.index', compact('rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('admin.rekening.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rekening::create([
            'id_bank' => $request->id_bank,
            'no_rekening' => $request->no_rekening,
            'atas_nama' => $request->atas_nama,
            'cabang' => $request->cabang,
            'status' => $request->status,
        ]);
        return redirect(route('rekening.index'))->with('success', 'Rekening berhasil ditambahkan');
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
        $rekening = Rekening::find($id);
        $banks = Bank::all();
        return view('admin.rekening.edit', compact('rekening', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekening $rekening)
    {
        $input = $request->all();
        $rekening->update($input);
        return redirect(route('rekening.index'))->with('success', 'Rekening berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        $rekening->delete();
        return redirect(route('rekening.index'))->with('success', 'Rekening berhasil dihapus');
    }
}
