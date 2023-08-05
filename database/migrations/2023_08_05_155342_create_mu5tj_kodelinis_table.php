<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_kodelini', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_kodelini');
    }
};
