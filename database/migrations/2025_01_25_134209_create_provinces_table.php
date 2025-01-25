<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('provinces', function (Blueprint $table) {
        $table->id();
        $table->string('province');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('provinces');
}

};
