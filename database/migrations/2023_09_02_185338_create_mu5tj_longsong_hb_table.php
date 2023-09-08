<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_longsong_hb', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('mu5tj_longsong')->restrictOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->unsignedBigInteger('spec_id');
            $table->foreign('spec_id')->references('id')->on('mu5tj_longsong_specs')->restrictOnDelete();
            $table->unsignedBigInteger('lini_id');
            $table->foreign('lini_id')->references('id')->on('mu5tj_kodelini')->restrictOnDelete();
            $table->string('no_lot');
            $table->string('kode');
            $table->string('mesin_bakar');
            $table->string('waktu_bakar');
            $table->string('temperature');
            $table->float('titik_11');
            $table->float('titik_12');
            $table->float('titik_13');
            $table->float('titik_14');
            $table->float('titik_15');
            $table->float('titik_21');
            $table->float('titik_22');
            $table->float('titik_23');
            $table->float('titik_24');
            $table->float('titik_25');
            $table->enum("status", ['MIN', 'MAX', "MINMAX", "PASSED"]);
            $table->integer('mato');
            $table->integer('retry');
            $table->string('status_bakar');
            $table->timestamp('tanggal_create');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_longsong_hb');
    }
};
