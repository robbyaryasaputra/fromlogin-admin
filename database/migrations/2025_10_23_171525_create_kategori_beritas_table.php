<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kategori_beritas', function (Blueprint $table) {
            $table->increments('kategori_id'); //
            $table->string('nama', 100); //
            $table->string('slug', 100)->unique(); //
            $table->text('deskripsi')->nullable(); //
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_beritas');
    }
};