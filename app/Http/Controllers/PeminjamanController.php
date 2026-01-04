<?php
namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tempat_id' => 'required|exists:tempats,id',
            'tanggal_pinjam' => 'required|date|after:tomorrow-1',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'kegiatan' => 'required|string|max:255',
        ]);

        Peminjaman::create([
            'user_id' => auth()->id(),
            'tempat_id' => $request->tempat_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'no_hp' => $request->no_hp,
            'kegiatan' => $request->kegiatan,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Peminjaman berhasil diajukan! Admin akan hubungi via WA.');
    }
   public function adminIndex()
    {
    $peminjamen = \App\Models\Peminjaman::with(['user', 'tempat'])
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
    return view('admin.peminjaman.index', compact('peminjamen'));
    }



    public function show(Peminjaman $peminjaman)
    {
    $peminjaman->load(['user', 'tempat']);
    return view('admin.peminjaman.show', compact('peminjaman'));
    }

}
