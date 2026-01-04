<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nama"=> "Buoquet",
                "gambar"=> "gambar.png",
                "kategori"=> "uang",
                "stok"=> "1"
                ],
            ];
            
    Produk::insert($data);
        
    }
}
