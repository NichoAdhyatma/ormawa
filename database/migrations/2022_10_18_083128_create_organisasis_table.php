<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('jurusan_id')->nullable();
            $table->foreignId('ketua')->unique()->nullable();
            $table->foreignId('wakil')->unique()->nullable();
            $table->string('visi');
            $table->string('misi');
            $table->text('desc');
            $table->string('url')->nullable();
            $table->string('photo_url', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisasis');
    }
};
