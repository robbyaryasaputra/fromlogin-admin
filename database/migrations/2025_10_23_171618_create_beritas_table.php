<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->increments('berita_id'); //
            $table->unsignedInteger('kategori_id'); //
            $table->string('judul', 255); //
            $table->string('slug', 255)->unique(); //
            $table->text('isi_html')->nullable(); //
            $table->string('penulis', 100)->nullable(); //
            $table->string('status', 20)->default('draft'); //
            $table->timestamp('terbit_at')->nullable(); //
            $table->timestamps();
            
            // Relasi Foreign Key
            $table->foreign('kategori_id')
                  ->references('kategori_id')
                  ->on('kategori_beritas')
                  ->onDelete('restrict'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};