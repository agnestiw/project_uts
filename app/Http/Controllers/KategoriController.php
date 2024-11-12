<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $kategori = Kategori::all();

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $data=[
            'nama_kategori' => $request->nama_kategori
        ];
        Kategori::create($data);

        return redirect('/kategori/index')->with('success', 'Berhasil menambahkan kategori');
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
