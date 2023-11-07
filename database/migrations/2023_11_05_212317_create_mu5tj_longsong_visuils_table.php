<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_longsong_visuil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('mu5tj_longsong')->restrictOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->unsignedBigInteger('lini_id');
            $table->foreign('lini_id')->references('id')->on('mu5tj_kodelini')->restrictOnDelete();
            $table->string('no_lot');
            $table->string('kode');
            $table->bigInteger('jumlah');
            $table->integer('n');
            $table->integer('sample');
            $table->integer('n1_visuil');
            $table->integer('n2_visuil');
            $table->enum('status_visuil', ['B', 'TB']);
            $table->integer('la_0lb');
            $table->integer('la_1lb');
            $table->integer('la_3lb');
            $table->integer('la_4lb');
            $table->string('la_status');
            $table->enum('la_result', ['B', 'TB']);
            $table->integer('retry');
            $table->integer('mato');
            $table->string('status');
            $table->timestamp('tanggal_create');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_longsong_visuil');
    }
};
