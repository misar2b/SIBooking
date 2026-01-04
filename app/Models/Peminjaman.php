<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
        'user_id', 'tempat_id', 'tanggal_pinjam', 'jam_mulai', 
        'jam_selesai', 'no_hp', 'kegiatan', 'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tempat()
    {
        return $this->belongsTo(Tempat::class);
    }
}
