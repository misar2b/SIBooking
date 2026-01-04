<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users (role: user only).
     */
   public function index()
    {
        $users = User::where('id', '!=', auth()->id())
                     ->latest()
                     ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        // Simple delete (tanpa check role dulu)
        $user->delete();
        
        return redirect()->route('admin.users.index')
                       ->with('success', 'User ' . $user->name . ' berhasil dihapus!');
    }
}