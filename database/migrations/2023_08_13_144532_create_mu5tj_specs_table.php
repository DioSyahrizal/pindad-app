<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_specs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lini');
            $table->foreign('id_lini')->references('id')->on('mu5tj_kodelini')->restrictOnDelete();
            $table->string('kode_spec')->default("A");
            $table->float('5mm_min');
            $table->float('5mm_max');
            $table->float('40mm_min');
            $table->float('40mm_max');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_specs');
    }
};
