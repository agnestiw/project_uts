<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        $buku = Buku::all();
        return view('buku.index', compact('kategori', 'buku'));
    }

    public function simpan(Request $request)
    {
        $data = [
            'kode' => $request->kode,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'kategori_id' => $request->kategori_id,
        ];

        Buku::create($data);
        return redirect('/buku/index')->with('success', 'Berhasil menambahkan Buku');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
