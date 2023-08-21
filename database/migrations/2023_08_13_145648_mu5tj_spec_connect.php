<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mu5tj', function (Blueprint $table) {
            $table->after('temperature', function (Blueprint $table) {
//                $table->unsignedBigInteger('spec_id')->nullable();
//                $table->foreign('spec_id')->references('id')->on('mu5tj_specs')->restrictOnDelete();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
                $table->string('kode')->after('kode_mesin_bakar');
                $table->integer('retry')->default(0);
                $table->integer('mato')->default(0);
                $table->enum('status', ['MIN', 'MAX', 'PASSED', 'MINMAX'])->default('MIN');
                $table->string('status_bakar')->default('-');
                $table->timestamp('tanggal_create')->default(DB::raw('CURRENT_TIMESTAMP'));
            });
        });
    }

    public function down(): void
    {
        Schema::table('mu5tj', function (Blueprint $table) {
//            $table->dropForeign(['spec_id']);
//            $table->dropColumn('spec_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('kode');
            $table->dropColumn('retry');
            $table->dropColumn('status');
            $table->dropColumn('tanggal_create');
        });
    }
};
