<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $isAdmin = Auth::user()->role === 'admin';  // ← PAKSA GANTI INI
        return view('profile.index', compact('isAdmin'));
    }

   public function edit()
{
    if (auth()->user()->role === 'admin') {
        return view('admin.profile.edit');
    }

    return view('admin.users.profile.edit');
}


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
        ]);

        Auth::user()->update($request->only('name', 'email'));
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diupdate!');
    }
}
