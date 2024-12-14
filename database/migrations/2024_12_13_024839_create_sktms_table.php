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
        // Tabel sktms (hanya sampai atribut kabupaten)
        Schema::create('sktms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->constrained('pengajuans')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tempat');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('telepon')->nullable();
            $table->text('alamat_lengkap');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->timestamps();
        });

        // Tabel pendukung_sktms (atribut lainnya kecuali dokumen_pendukung)
        Schema::create('pendukung_sktms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sktm_id')->constrained('sktms')->onDelete('cascade');
            $table->string('ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->integer('jumlah_tanggungan')->nullable();
            $table->decimal('penghasilan_perbulan', 15, 2)->nullable();
            $table->timestamps();
        });

        // Tabel dokumen_sktms (hanya untuk dokumen_pendukung)
        Schema::create('dokumen_sktms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sktm_id')->constrained('sktms')->onDelete('cascade');
            $table->string('pilih_tujuan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('dokumen_pendukung')->nullable(); // File dokumen disimpan di public storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel dokumen_sktms terlebih dahulu karena ada foreign key
        Schema::dropIfExists('dokumen_sktms');

        // Hapus tabel pendukung_sktms
        Schema::dropIfExists('pendukung_sktms');

        // Hapus tabel sktms
        Schema::dropIfExists('sktms');
    }
};
