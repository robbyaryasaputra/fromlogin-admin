<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            // Sesuai gaya: increments('nama_id')
            $table->increments('profil_id'); //
            
            // Sesuai gaya: string('nama', 100)
            $table->string('nama_desa', 100)->nullable(); //
            $table->string('kecamatan', 100)->nullable(); //
            $table->string('kabupaten', 100)->nullable(); //
            $table->string('provinsi', 100)->nullable(); //
            $table->text('alamat_kantor')->nullable(); //
            $table->string('email', 100)->nullable(); //
            $table->string('telepon', 20)->nullable(); //
            $table->text('visi')->nullable(); //
            $table->text('misi')->nullable(); //
            
            // Kolom 'logo' tidak ada di sini
            // karena "Logo -> via media"
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profils');
    }
};