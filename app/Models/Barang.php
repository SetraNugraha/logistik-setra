<?php

namespace App\Models;

use App\Models\BrgMasuk;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $fillable = ["kode_brg", "stok"];

    public function brgMasuk()
    {
        return $this->hasMany(BrgMasuk::class);
    }

    public function brgKeluar()
    {
        return $this->hasMany(BrgMasuk::class);
    }
}
