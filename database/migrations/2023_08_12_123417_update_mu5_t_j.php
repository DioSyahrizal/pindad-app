<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mu5tj', function (Blueprint $table) {
            $table->after('temperature', function (Blueprint $table) {
                $table->unsignedBigInteger('kode_lini');
                $table->foreign('kode_lini')->references('id')->on('mu5tj_kodelini')->restrictOnDelete();
            });

        });
    }

    public function down(): void
    {
        Schema::table('mu5tj', function (Blueprint $table) {
            $table->dropForeign(['kode_lini']);
            $table->dropColumn('kode_lini');
        });
    }
};
