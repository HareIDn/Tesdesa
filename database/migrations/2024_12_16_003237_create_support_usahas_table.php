<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('support_usahas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_surat_usaha')->constrained('surat_usahas')->onDelete('cascade'); // Relasi dengan surat_usahas
            $table->string('nama_usaha');
            $table->string('bentuk_usaha');
            $table->string('bidang_usaha');
            $table->decimal('modal_usaha', 60, 2);
            $table->integer('jumlah_karyawan');
            $table->text('alamat_usaha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('support_usahas');
    }
};
