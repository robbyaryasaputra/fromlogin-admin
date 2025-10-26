<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->increments('galeri_id'); //
            $table->string('judul', 255); //
            $table->text('deskripsi')->nullable(); //
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galeris');
    }
};