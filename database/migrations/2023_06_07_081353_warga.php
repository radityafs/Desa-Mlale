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
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 16);
            $table->string('nama_lengkap', 64);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 64);
            $table->date('tanggal_lahir');
            $table->string('pendidikan', 32);
            $table->string('pekerjaan', 32);
            $table->enum('status', ['Hidup', 'Meninggal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
