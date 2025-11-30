<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // user (pemesan)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('teknisi_id')->constrained('teknisis')->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->text('alamat');
            $table->string('nama_barang');
            $table->text('detail_kerusakan');
            $table->enum('metode_pembayaran', ['COD','Transfer'])->default('COD');
            $table->enum('status', ['pending','diterima','ditolak','selesai'])->default('pending');
            $table->integer('total_bayar')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
