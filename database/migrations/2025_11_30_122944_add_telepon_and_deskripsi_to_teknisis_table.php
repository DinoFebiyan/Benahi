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
        Schema::table('teknisis', function (Blueprint $table) {
            $table->string('telepon')->nullable()->after('email');
            $table->text('deskripsi')->nullable()->after('pengalaman_tahun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teknisis', function (Blueprint $table) {
            $table->dropColumn(['telepon', 'deskripsi']);
        });
    }
};
