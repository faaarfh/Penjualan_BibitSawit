<?php

use App\Enums\MetodePembayaran;
use App\Enums\StatusPesanan;
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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('total_harga')->default(0);
            $table->enum('status', StatusPesanan::values());
            $table->enum('metode_pembayaran', MetodePembayaran::values())->default(MetodePembayaran::COD);
            $table->date('tanggal_pesan')->useCurrent();
            $table->date('tanggal_bayar')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
