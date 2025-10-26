<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('media_id'); //
            $table->string('ref_table', 50); //
            $table->unsignedInteger('ref_id'); //
            $table->string('file_url', 255); //
            $table->text('caption')->nullable(); //
            $table->string('mime_type', 100)->nullable(); //
            $table->integer('sort_order')->default(0); //
            $table->timestamps();
            
            // Index untuk mempercepat query
            $table->index(['ref_table', 'ref_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
};