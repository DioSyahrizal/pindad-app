<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_longsong', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->unsignedBigInteger('flow_id');
            $table->foreign('flow_id')->references('id')->on('mu5tj_longsong_flow')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_longsong');
    }
};
