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
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_matakuliah')->unique()->constrained('matakuliahs')->onUpdate('cascade')->onDelete('restrict');
            $table->string('judul_materi');
            $table->text('body');
            $table->foreignId('id_images')->unique()->constrained('images')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('halaman');
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
        Schema::dropIfExists('materis');
    }
};
