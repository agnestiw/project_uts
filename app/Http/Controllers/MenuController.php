<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'menu_name' => $request->menu_name,
            'menu_link' => $request->menu_link,
            'menu_icon' => $request->menu_icon,
        ];

        Menu::create($data);

        return redirect()->route('menu.index')->with('success','Menu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $menu = Menu::find($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->menu_name = $request->menu_name;
        $menu->menu_link = $request->menu_link;
        $menu->menu_icon = $request->menu_icon;

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $delete = Menu::find($id);
        if ($delete) {
            $delete->delete();
            return response()->json(['success' => 'Berhasil Dihapus']);
        }
    
        return response()->json(['error' => 'Data tidak ditemukan!'], 404);
    }
    
}
