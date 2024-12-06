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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_dokumen');
            $table->string('file_pdf')->nullable(); // Kolom untuk file PDF
            $table->string('data_pendukung1')->nullable(); // Kolom data pendukung 1
            $table->string('data_pendukung2')->nullable(); // Kolom data pendukung 2
            $table->string('data_pendukung3')->nullable(); // Kolom data pendukung 3
            $table->string('data_pendukung4')->nullable(); // Kolom data pendukung 4
            $table->string('data_pendukung5')->nullable(); // Kolom data pendukung 5
            $table->string('data_pendukung6')->nullable(); // Kolom data pendukung 6
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
