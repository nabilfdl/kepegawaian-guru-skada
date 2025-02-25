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
        Schema::create('user_edit_verifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('sex', ['Laki-Laki', 'Perempuan']);
            $table->text('address');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('religion', ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->foreignId('subject_id')->nullable()->constrained('subjects')->onDelete('set null');
            $table->enum('position', ['PNS', 'P3K', 'Honorer']);
            $table->enum('marital_status', ['Belum Kawin', 'Kawin']);
            $table->enum('status', ['Aktif', 'Purna Tugas']);
            $table->enum('role', ['Admin', 'Operator', 'User']);
            $table->string('pfp')->nullable(); // Add this line for the profile picture field
            $table->enum('acceptance_status', ['Diverifikasi', 'Ditolak', 'Dalam Proses']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_edit_verifications');
    }
};
