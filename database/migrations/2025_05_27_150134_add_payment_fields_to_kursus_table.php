<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('kursus', function (Blueprint $table) {
            $table->string('snap_token')->nullable();
            $table->string('payment_status')->default('Menunggu Pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kursus', function (Blueprint $table) {
            $table->dropColumn('snap_token');
            $table->dropColumn('payment_status');
        });
    }
};
