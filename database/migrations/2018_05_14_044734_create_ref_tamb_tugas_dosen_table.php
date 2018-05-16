<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefTambTugasDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_tamb_tugas_dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode', 10);
            $table->string('nama_tamb_tugas_dosen', 255);
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
        Schema::dropIfExists('ref_tamb_tugas_dosen');
    }
}
