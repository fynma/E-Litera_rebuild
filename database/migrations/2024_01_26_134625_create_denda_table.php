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
        Schema::create('denda', function (Blueprint $table) {
            $table->id('denda_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('keterlambatan');
            $table->unsignedBigInteger('tarif_pembayaran');
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
        Schema::dropIfExists('denda');
    }
};
