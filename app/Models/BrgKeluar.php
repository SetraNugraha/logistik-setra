<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrgKeluar extends Model
{
    protected $table = "brg_keluar";
    protected $fillable = ["brg_id", "no_brg_keluar", "quantity", "destination"];

    public function barang()
    {
        return $this->belongsTo(Barang::class, "brg_id", "id");
    }
}
