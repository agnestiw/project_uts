<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $find = User::find(id: Auth::user()->id);
            $find->status_user = "active";
            $find->save();

            $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::attempt($data)){
                if(Auth::user()->ID_jenis_user == 1){
                    return redirect('/dashboard/admin');
                }
                if(Auth::user()->ID_jenis_user == 2){
                    return redirect('/dashboard/staff');
                }
                return redirect()->route('post.index');
            }

        }

        // $data = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // if (Auth::attempt($data)){
        //     if(Auth::user()->ID_jenis_user == 1){
        //         return redirect('/dashboard/admin');
        //     }
        //     if(Auth::user()->ID_jenis_user == 2){
        //         return redirect('/dashboard/staff');
        //     }
        //     return redirect()->route('post.index');
        // }
        return redirect('/auth-page')->with('error', 'Masukkan data yang benar!');
    }

    public function logout(Request $request)
    {
        $find = User::find(id: Auth::user()->id);
        $find->status_user = "inactive";
        $find->save();
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth-page');
    }

}
