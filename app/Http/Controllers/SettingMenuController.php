<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\SettingMenu;
use App\Models\User;
use Illuminate\Http\Request;

class SettingMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aksesmenu = SettingMenu::with(['user', 'menu'])->get();
        $menu = Menu::all();
        $user = User::all();
        return view('aksesMenu.index', compact('menu', 'user', 'aksesmenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'ID_jenis_user' => $request->ID_jenis_user,
            'ID_menu' => $request->ID_menu
        ];

        SettingMenu::create($data);

        return redirect()->back()->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(SettingMenu $settingMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SettingMenu $settingMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SettingMenu $settingMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SettingMenu $settingMenu)
    {
        //
    }
}
