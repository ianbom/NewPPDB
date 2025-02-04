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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['text', 'date', 'file', 'radio', 'checkbox']);
            $table->text('pertanyaan');
            $table->string('opsi_A')->nullable();
            $table->string('opsi_B')->nullable();
            $table->string('opsi_C')->nullable();
            $table->string('opsi_D')->nullable();
            $table->string('opsi_E')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
