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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat');
            $table->foreignId('classification_id')->constrained('mail_classifications')->onDelete('cascade');
            $table->string('nomor_surat')->unique();
            $table->string('asal_atau_tujuan');
            $table->text('perihal');
            $table->date('tanggal_surat');
            $table->string('path_file')->nullable();
            $table->string('status')->default('konsep');
            $table->foreignId('dibuat_oleh')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
