<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_longsong_spec_actives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spec_id');
            $table->foreign('spec_id')->references('id')->on('mu5tj_longsong_specs')->restrictOnDelete();
            $table->unsignedBigInteger('lini_id');
            $table->foreign('lini_id')->references('id')->on('mu5tj_kodelini')->restrictOnDelete();
            $table->unsignedBigInteger('flow_id');
            $table->foreign('flow_id')->references('id')->on('mu5tj_longsong_flow')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_longsong_spec_actives');
    }
};
