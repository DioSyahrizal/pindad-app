<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_longsong_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('mu5tj_longsong')->restrictOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->unsignedBigInteger('lini_id');
            $table->foreign('lini_id')->references('id')->on('mu5tj_kodelini')->restrictOnDelete();
            $table->string('no_lot');
            $table->string('kode');
            $table->string('kode_kirim');
            $table->string('lot_kirim');
            $table->timestamp('tgl_pengiriman');
            $table->string('mato');
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_longsong_pengiriman');
    }
};
