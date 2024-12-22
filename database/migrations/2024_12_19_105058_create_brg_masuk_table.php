<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brg_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("brg_id");
            $table->string("no_brg_masuk")->unique();
            $table->integer("quantity");
            $table->string("origin");

            // Relation
            $table->foreign("brg_id")->references("id")->on("barang");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brg_masuk');
    }
};
