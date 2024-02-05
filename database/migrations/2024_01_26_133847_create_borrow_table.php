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
            $table->id('id_borrow');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_kembali');
            $table->bigInteger('jumlah_pinjam');
            $table->boolean('konfirmasi_pinjam')->default(false);
            $table->boolean('konfirmasi_kembali')->default(false);
            $table->string('status')->default('tersedia');
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
