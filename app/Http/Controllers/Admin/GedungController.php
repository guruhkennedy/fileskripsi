<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gedung;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gedungs = Gedung::when($request->input('name'), function ($query, $name) {
            return $query->where('nama', 'like', '%' . $name . '%');
        })
            ->select('*')
            ->paginate(10);
        return view('admin.gedung.index', compact('gedungs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileimage = $request->file('foto');
        $nameimage = time() . '.' . $fileimage->getClientOriginalExtension();
        $fileimage->move(public_path('img/produk'), $nameimage);

        $fullPathUriImage = $nameimage;

        Gedung::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $fullPathUriImage,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);
        return redirect(route('gedung.index'))->with('success', 'Gedung berhasil ditambahkan');
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
    public function edit(Gedung $gedung)
    {
        return view('admin.gedung.edit')->with('gedung', $gedung);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gedung $gedung)
    {
        $input = $request->all();
        if ($image = $request->file('foto')) {
            $fileimage = $request->file('foto');
            $nameimage = time() . '.' . $fileimage->getClientOriginalExtension();
            $fileimage->move(public_path('img/produk'), $nameimage);

            $fullPathUriImage = $nameimage;
            $input['foto'] = "$fullPathUriImage";
        } else {
            unset($input['foto']);
        }

        $gedung->update($input);
        return redirect()->route('gedung.index')->with('success', 'Gedung berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gedung $gedung)
    {
        $gedung->delete();
        return redirect()->route('gedung.index')->with('success', 'Gedung berhasil dihapus');
    }
}
