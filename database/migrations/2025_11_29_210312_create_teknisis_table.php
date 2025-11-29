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
        Schema::create('teknisis', function (Blueprint $table) {
            $table->id();

            // Data teknisi
            $table->string('nama');                 // nama teknisi
            $table->string('kategori');             // jenis teknisi (Elektronik, Motor, Mesin)
            $table->string('email')->nullable();    // email teknisi
            $table->string('telepon')->nullable();  // no HP
            $table->string('foto')->nullable();     // foto profil teknisi
            $table->float('rating')->default(5);    // rating (default 5)
            $table->text('deskripsi')->nullable();  // CV / profil teknisi

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknisis');
    }
};
