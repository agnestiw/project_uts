<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Http\Request;

class JenisUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $JenisUser = JenisUser::all();
        return view('role.index', compact('JenisUser'));
    }

    public function simpan(Request $request)
    {
        $data = [
            'jenis_user' => $request->jenis_user
        ];

        JenisUser::create($data);

        return redirect()->route('role.index')->with('success', 'role berhasil ditambah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(JenisUser $jenisUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisUser $jenisUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisUser $jenisUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisUser $jenisUser)
    {
        //
    }

    public function delete($id)
    {
        $JenisUser = JenisUser::find($id);
        if ($JenisUser) {
            $JenisUser->delete();
            return redirect()->back()->with('success', 'Berhasil Dihapus');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan!');
    }
}
