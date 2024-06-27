<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPoli');
            $table->string('image')->nullable();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->timestamps();
            $table->foreign('idPoli')->references('id')->on('polis')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
