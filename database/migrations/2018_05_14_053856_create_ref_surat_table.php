<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_surat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat',255);
            $table->date('tanggal_surat');
            $table->string('nama_ttd',100);
            $table->enum('jenis_surat', ['rekomendasi_kanwil', 'rekomendasi_kabupaten', 'surat_pengajuan']);
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
        Schema::dropIfExists('ref_surat');
    }
}
