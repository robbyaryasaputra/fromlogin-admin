<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('agenda_id'); //
            $table->string('judul', 255); //
            $table->string('lokasi', 255)->nullable(); //
            $table->dateTime('tanggal_mulai'); //
            $table->dateTime('tanggal_selesai')->nullable(); //
            $table->string('penyelenggara', 100)->nullable(); //
            $table->text('deskripsi')->nullable(); //
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agendas');
    }
};