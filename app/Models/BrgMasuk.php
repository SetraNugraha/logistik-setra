<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;

class BrgMasuk extends Model
{
    protected $table = "brg_masuk";
    protected $fillable = ["brg_id", "no_brg_masuk", "quantity", "origin"];

    public function barang()
    {
        return $this->belongsTo(Barang::class, "brg_id", "id");
    }
}
