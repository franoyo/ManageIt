<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class loginRegisterController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:250|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $credentials = $request->only('email', 'password');
        return redirect()->back()->withSuccess("USUARIO CREADO CORRECTAMENTE");
    }
}
