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
        Schema::create('borrow', function (Blueprint $table) {
            $table->id('borrow_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_kembali');
            $table->bigInteger('jumlah_pinjam');
            $table->boolean('konfirmasi_pinjam');
            $table->string('petugas_pinjam');
            $table->boolean('konfirmasi_kembali');
            $table->string('petugas_kembali');
            $table->string('status')->default('Tersedia');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('book_id')->on('book')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow');
    }
};
