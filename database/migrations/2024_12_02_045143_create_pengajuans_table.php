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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('pilih_tujuan')->nullable();
            $table->string('jenis_pengajuan');
            $table->enum('status', [
                'diterima',
                'diproses',
                'disetujui',
                'ditolak'
            ])->default('diterima');
            $table->text('deskripsi')->nullable();
            $table->datetime('tanggal_pengajuan')->nullable();
            $table->datetime('tanggal_diproses')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
