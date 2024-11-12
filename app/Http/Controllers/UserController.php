<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        $role = JenisUser::all();
        $menu = Menu::all();
        return view('user.index', compact('user', 'role', 'menu'));
    }
    
    // public function show()
    // {
    //     return view('user.show');
    // }

    // public function create(Request $request)
    // {
    //     return view('user.create');
    // }

    public function simpan(Request $request)
    {
        $data=[
            'name'=> $request->name,
            'email'=> $request->email,
            'no_hp'=> $request->no_hp,
            'kota'=> $request->kota,
            'password'=> $request->password,
            'ID_jenis_user' => $request->ID_jenis_user
        ];

        User::create($data);
        return redirect('/user/show');
    }

    public function edit($id)
    {
        $data = User::find($id);
        $jenis_users = JenisUser::all();
        return view('user.edit', compact('data', 'jenis_users'));
    }

    public function update(Request $request, $id)
    {
                // Validate the request data (add your own validation rules here)
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email,' . $id,
                    'no_hp' => 'nullable|string',
                    'kota' => 'nullable|string',
                    'ID_jenis_user' => 'required|exists:jenis_users,ID_jenis_user',
                ]);
        
                // Find the user by ID
                $user = User::findOrFail($id);
        
                // Prepare data for updating
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'email_verified_at' => $request->email_verified_at ?? null,
                    'no_hp' => $request->no_hp ?? null,
                    'kota' => $request->kota ?? null,
                    'ID_jenis_user' => $request->ID_jenis_user,
                    // 'status_user' => $request->status_user,
                ];
        
                // Update the user's data
                $user->update($data);
        
                // Redirect with success message
                return redirect()->route('user.index')->with('success', 'Data berhasil diperbarui');

    }

    public function delete($id)
    {
        $delete = User::find($id);
        if ($delete) {
            $delete->delete();
            return response()->json(['success' => 'Berhasil Dihapus']);
        }

        return response()->json(['error' => 'Data tidak ditemukan!'], 404);
    }

    
}
