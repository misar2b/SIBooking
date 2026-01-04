<?php
namespace App\Http\Controllers;

use App\Models\Tempat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TempatController extends Controller
{
   public function index(Request $request)
    {
    $search = $request->search;

    $tempats = Tempat::when($search, function ($query) use ($search) {
        $query->where('nama_tempat', 'like', "%$search%")
              ->orWhere('lokasi', 'like', "%$search%")
              ->orWhere('kategori', 'like', "%$search%");
    })->get();

    return view('admin.tempat.index', compact('tempats'));
    }


    public function create()
    {
        return view('admin.tempat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:255',
            'kategori' => 'required|in:ruangan,aula',
            'status' => 'required|in:tersedia,tidak tersedia',
            'gambar' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/tempat'), $filename);
            $data['gambar'] = 'img/tempat/' . $filename;  // ← SIMPAN PATH BENAR!
        }

        Tempat::create($data);  // ← SEKARANG BENAR!
        
        return redirect('/admin/tempat')->with('success', 'Tempat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tempat = Tempat::findOrFail($id);
        return view('admin.tempat.edit', compact('tempat'));
    }

    public function update(Request $request, $id)
    {
        $tempat = Tempat::findOrFail($id);
        
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:255',
            'kategori' => 'required|in:ruangan,aula',
            'status' => 'required|in:tersedia,dipakai,ditolak',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            $oldImage = public_path('img/tempat/' . $tempat->gambar);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/tempat'), $filename);
            $request['gambar'] = 'img/tempat/' . $filename;
        }

        $tempat->update($request->all());
        return redirect('/admin/tempat')->with('success', 'Tempat berhasil diubah.');
    }

    public function destroy($id)
    {
        $tempat = Tempat::findOrFail($id);
        
        // Hapus gambar
        $filePath = public_path($tempat->gambar);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        
        $tempat->delete();  // ← SATU DELETE AJA!
        
        return redirect('/admin/tempat')->with('success', 'Tempat berhasil dihapus.');
    }
}
