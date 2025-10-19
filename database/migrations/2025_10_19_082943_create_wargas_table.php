<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            // kode unik warga, bisa diisi manual atau otomatis
            $table->string('warga_id')->unique();
            // Nomor KTP unik
            $table->string('no_ktp')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
