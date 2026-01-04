<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\User;

class PesanController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'subject' => 'required|max:255',
        'message' => 'required'
    ]);

    Pesan::create(array_merge($request->only(['name', 'email', 'subject', 'message']), [
        'user_id' => auth()->id()
    ]));

    return redirect()->back()->with('success', 'Pesan berhasil dikirim ke admin!');
}

public function destroy(Pesan $pesan)
{
    $pesan->delete();
    return redirect()->route('admin.pesan.index')
    ->with('success', 'Pesan berhasil dihapus!');
}

public function adminIndex()
{
    $pesans = Pesan::with('user')->orderBy('created_at', 'desc')->paginate(10);
    return view('admin.pesan.index', compact('pesans'));
}



}
