<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefRkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_rka', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sumber_pendanaan');
            $table->integer('laporan_keuangan');
            $table->integer('ang_blj_tahunan');
            $table->string('ket_sumber_pendanaan',255);
            $table->string('ket_laporan_keuangan',255);
            $table->string('ket_ang_blj_tahunan',255);
            $table->string('file_path',255);
            $table->integer('lembaga_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_rka');
    }
}
