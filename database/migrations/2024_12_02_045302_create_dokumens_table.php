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
            $table->string('file_pdf'); // Path to the PDF in storage
            $table->string('data_pendukung1')->nullable(); // Allow this column to be nullable
            $table->string('data_pendukung2')->nullable(); // Allow this column to be nullable
            $table->string('data_pendukung3')->nullable(); // Allow this column to be nullable
            $table->string('data_pendukung4')->nullable(); // Allow this column to be nullable
            $table->string('data_pendukung5')->nullable(); // Allow this column to be nullable
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
