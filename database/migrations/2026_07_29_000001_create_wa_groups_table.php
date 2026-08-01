<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wa_groups', function (Blueprint $table) {
            $table->id();
            $table->string('angkatan', 10)->unique();
            $table->string('link_group');
            $table->string('nama_group')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wa_groups');
    }
};

