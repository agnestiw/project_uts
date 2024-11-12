<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
        ]);

        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        // }

        // Create the user
       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'ID_jenis_user' => $request->jenis_user,
            'status_user' => $request->status_user ?? 'inactive', // Set default to 'active' if null
        ]);

        // Respond with success
        //return response()->json(['success' => true, 'message' => 'Account created successfully']);

        return redirect('/auth-page')->with('success', 'Berhasil membuat akun');
    }
}
