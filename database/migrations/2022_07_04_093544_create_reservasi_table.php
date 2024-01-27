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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->integer('id_user')->nullable()->default(0);
            $table->integer('id_gedung');
            $table->string('total');
            $table->date('tanggal');
            $table->integer('status')->default(0);
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->string('snap_token')->nullable();
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
        Schema::dropIfExists('reservasi');
    }
};
