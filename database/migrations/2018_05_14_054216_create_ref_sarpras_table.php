<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefSarprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_sarpras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ruang_perkuliahan');
            $table->integer('asrama');
            $table->integer('kantor');
            $table->integer('masjid');
            $table->integer('mck');
            $table->integer('komputer');
            $table->integer('ruang_dosen');
            $table->integer('aula');
            $table->integer('lab');
            $table->double('luas_ruang_perkuliahan');
            $table->double('luas_asrama');
            $table->double('luas_ruang_dosen');
            $table->double('luas_aula');
            $table->string('nama_lab',255);
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
        Schema::dropIfExists('ref_sarpras');
    }
}
