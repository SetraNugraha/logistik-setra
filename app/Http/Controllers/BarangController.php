<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::orderBy("created_at", "desc")->paginate(10);
        return view("pages.gudang", [
            "title" => "Gudang",
            "barang" => $barang
        ]);
    }

    public function getBarangByKodeBrg($kode_brg)
    {
        $existsBarang = Barang::where("kode_brg", Str::upper($kode_brg))->first();

        if ($existsBarang) {
            return response()->json([
                "exists" => true,
                "barang" => [
                    "kode_brg" => $existsBarang->kode_brg,
                    "stok" => $existsBarang->stok
                ]
            ]);
        } else {
            return response()->json([
                "exists" => false,
                "message" => "Barang tidak ditemukan"
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

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
