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
        Schema::create('kursus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('alamat');
            $table->text('alasan');
            $table->enum('kursus',['cybersecurity','uiux']);
            $table->enum('status',['Ditinjau','Disetujui','Ditolak'])->default('Ditinjau');
            $table->string('cv');
            $table->timestamps();
            $table->string('payment_status')->default('Menunggu Pembayaran');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursus');
    }
};
