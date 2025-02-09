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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->enum('sex', ['Laki-Laki', 'Perempuan']);
            $table->text('address');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('religion', ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->foreignId('subject_id')->nullable()->constrained('subjects')->onDelete('set null');
            $table->enum('position', ['PNS', 'P3K', 'Honorer']);
            $table->enum('marital_status', ['Belum Kawin', 'Sudah Kawin']);
            $table->enum('status', ['Aktif', 'Purna Tugas']);
            $table->enum('role', ['Admin', 'Operator', 'User']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
