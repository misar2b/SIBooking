<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    public $timestamps = false;
    protected $table = "tempats";
    protected $fillable = ["nama_tempat","lokasi","kapasitas","kategori","status","gambar",
    ];

}

