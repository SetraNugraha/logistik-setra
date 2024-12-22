<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BrgMasuk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrgMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = BrgMasuk::with("barang")->orderBy("created_at", "desc")->paginate(15);
        return view("pages.BrgMasuk.index", ['title' => 'Barang Masuk', "barangMasuk" => $barangMasuk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.BrgMasuk.create", ["title" => "Form Tambah Barang Masuk"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $noBrgMasuk = random_int(10000, 99999);
        $validate = $request->validate([
            "kode_brg" => "required|string|min:6|max:6",
            "quantity" => "required|integer",
            "origin" => "required|string"
        ]);

        // Cek Kode Barang pada Table Barang
        $existsBarang = Barang::where('kode_brg',  Str::upper($validate['kode_brg']))->first();

        if ($existsBarang) {
            $existsBarang->update([
                "stok" => $existsBarang->stok + $validate['quantity']
            ]);

            // Create Barang Masuk
            BrgMasuk::create([
                "brg_id" => $existsBarang->id,
                "no_brg_masuk" => $noBrgMasuk,
                "quantity" => $validate['quantity'],
                "origin" => $validate['origin']
            ]);
        } else {
            $newbarang = Barang::create([
                "kode_brg" => Str::upper($validate['kode_brg']),
                "stok" => $validate['quantity']
            ]);

            // Create Barang Masuk
            BrgMasuk::create([
                "brg_id" => $newbarang->id,
                "no_brg_masuk" => $noBrgMasuk,
                "quantity" => $validate['quantity'],
                "origin" => $validate['origin']
            ]);
        }

        return redirect()->route("brg-masuk-index")->with("message", "Barang masuk berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
