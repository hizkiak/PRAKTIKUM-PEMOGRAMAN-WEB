<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                ->cascadeOnDelete(); // Pemilik berkas
            $table->string('judul'); // Judul berkas
            $table->text('keterangan')->nullable(); // Keterangan (boleh kosong)
            $table->string('filename'); // Nama asli file
            $table->string('filepath'); // Lokasi file di storage
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};