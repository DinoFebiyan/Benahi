<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeknisisTable extends Migration
{
    public function up()
    {
        Schema::create('teknisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('kategori'); 
            $table->text('keahlian')->nullable();
            $table->text('cv')->nullable(); 
            $table->string('foto')->nullable();
            $table->float('rating')->default(0);
            $table->integer('jumlah_rating')->default(0);
            $table->integer('pengalaman_tahun')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teknisis');
    }
}
