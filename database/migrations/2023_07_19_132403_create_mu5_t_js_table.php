<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5_t_j', function (Blueprint $table) {
            $table->id();
            $table->string('no_lot');
            $table->string('kode_lini');
            $table->string('kode_mesin_bakar');
            $table->integer('temperature');
            $table->integer('titik_11');
            $table->integer('titik_12');
            $table->integer('titik_13');
            $table->integer('titik_14');
            $table->integer('titik_15');
            $table->integer('titik_21');
            $table->integer('titik_22');
            $table->integer('titik_23');
            $table->integer('titik_24');
            $table->integer('titik_25');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5_t_j');
    }
};
