<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mu5tj_longsong_dimensi', function (Blueprint $table) {
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
            $table->unsignedInteger('jumlah');
            $table->unsignedInteger('n');
            $table->unsignedInteger('sample');
            $table->unsignedInteger('p_min_n1');
            $table->unsignedInteger('p_min_n2');
            $table->unsignedInteger('p_max_n1');
            $table->unsignedInteger('p_max_n2');
            $table->string('p_status');
            $table->enum('p_result', ['B', 'TB']);
            $table->unsignedInteger('dd_min_n1');
            $table->unsignedInteger('dd_min_n2');
            $table->unsignedInteger('dd_max_n1');
            $table->unsignedInteger('dd_max_n2');
            $table->string('dd_status');
            $table->enum('dd_result', ['B', 'TB']);
            $table->unsignedInteger('dla_0lb');
            $table->unsignedInteger('dla_1lb');
            $table->unsignedInteger('dla_3lb');
            $table->unsignedInteger('dla_4lb');
            $table->string('dla_status');
            $table->enum('dla_result', ['B', 'TB']);
            $table->unsignedInteger('dmd_min_n1');
            $table->unsignedInteger('dmd_min_n2');
            $table->unsignedInteger('dmd_max_n1');
            $table->unsignedInteger('dmd_max_n2');
            $table->string('dmd_status');
            $table->enum('dmd_result', ['B', 'TB']);
            $table->unsignedInteger('mb_min_n1');
            $table->unsignedInteger('mb_min_n2');
            $table->unsignedInteger('mb_max_n1');
            $table->unsignedInteger('mb_max_n2');
            $table->string('mb_status');
            $table->enum('mb_result', ['B', 'TB']);
            $table->unsignedInteger('dlp_min_n1');
            $table->unsignedInteger('dlp_min_n2');
            $table->unsignedInteger('dlp_max_n1');
            $table->unsignedInteger('dlp_max_n2');
            $table->string('dlp_status');
            $table->enum('dlp_result', ['B', 'TB']);
            $table->unsignedInteger('dml_min_n1');
            $table->unsignedInteger('dml_min_n2');
            $table->unsignedInteger('dml_max_n1');
            $table->unsignedInteger('dml_max_n2');
            $table->string('dml_status');
            $table->enum('dml_result', ['B', 'TB']);
            $table->unsignedInteger('hs_min_n1');
            $table->unsignedInteger('hs_min_n2');
            $table->unsignedInteger('hs_max_n1');
            $table->unsignedInteger('hs_max_n2');
            $table->float('hs_min', 8, 2);
            $table->float('hs_max', 8, 2);
            $table->string('hs_status');
            $table->enum('hs_result', ['B', 'TB']);
            $table->unsignedInteger('td_min_n1');
            $table->unsignedInteger('td_min_n2');
            $table->unsignedInteger('td_max_n1');
            $table->unsignedInteger('td_max_n2');
            $table->float('td_min', 8, 2);
            $table->float('td_max', 8, 2);
            $table->string('td_status');
            $table->enum('td_result', ['B', 'TB']);
            $table->unsignedInteger('ta_min_n1');
            $table->unsignedInteger('ta_min_n2');
            $table->unsignedInteger('ta_max_n1');
            $table->unsignedInteger('ta_max_n2');
            $table->float('ta_min', 8, 2);
            $table->float('ta_max', 8, 2);
            $table->string('ta_status');
            $table->enum('ta_result', ['B', 'TB']);
            $table->unsignedInteger('klp_min_n1');
            $table->unsignedInteger('klp_min_n2');
            $table->unsignedInteger('klp_max_n1');
            $table->unsignedInteger('klp_max_n2');
            $table->float('klp_min', 8, 2);
            $table->float('klp_max', 8, 2);
            $table->string('klp_status');
            $table->enum('klp_result', ['B', 'TB']);
            $table->unsignedInteger('dk_min_n1');
            $table->unsignedInteger('dk_min_n2');
            $table->unsignedInteger('dk_max_n1');
            $table->unsignedInteger('dk_max_n2');
            $table->float('dk_min', 8, 2);
            $table->float('dk_max', 8, 2);
            $table->string('dk_status');
            $table->enum('dk_result', ['B', 'TB']);
            $table->integer('mato');
            $table->integer('retry');
            $table->string('status_retry');
            $table->enum('status', ['Terima', 'Tolak']);
            $table->string('keterangan')->nullable();
            $table->timestamp('tanggal_create');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mu5tj_longsong_dimensi');
    }
};
