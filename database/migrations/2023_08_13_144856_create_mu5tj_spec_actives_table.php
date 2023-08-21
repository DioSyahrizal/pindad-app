<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_spec_actives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_spec');
            $table->foreign('id_spec')->references('id')->on('mu5tj_specs')->restrictOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_spec_actives');
    }
};
