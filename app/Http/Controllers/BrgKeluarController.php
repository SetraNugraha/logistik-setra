<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BrgKeluar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrgKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BrgKeluar::with("barang")->orderBy("created_at", "desc")->paginate(15);
        return view("pages.BrgKeluar.index", [
            "title" => "Barang Keluar",
            "barangKeluar" => $barangKeluar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.BrgKeluar.create", [
            "title" => "Form Tambah Barang Keluar",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $noBrgKeluar = random_int(10000, 99999);
        $validate = $request->validate([
            "kode_brg" => "required|min:6|max:6",
            "quantity" => "required|integer",
            "destination" => "required|string"
        ]);

        // Validate Exists Barang
        $existsBarang = Barang::where("kode_brg", Str::upper($validate['kode_brg']))->first();

        if (!$existsBarang) {
            return back()->with("message", "Barang tidak ditemukan");
        }

        // Decrement stok
        $existsBarang->update([
            "stok" => $existsBarang->stok - $validate['quantity']
        ]);

        // Create brg_masuk
        BrgKeluar::create([
            "brg_id" => $existsBarang->id,
            "no_brg_keluar" => $noBrgKeluar,
            "quantity" => $validate['quantity'],
            "destination" => $validate['destination']
        ]);


        return redirect()->route("brg-keluar-index")->with("message", "Barang Keluar Berhasil Ditambahkan");
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
