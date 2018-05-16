<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMDosenStafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_dosen_staf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap',100);
            $table->string('tempat_lahir',100);
            $table->date('tanggal_lahir');
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->string('negara_asal',100);
            $table->integer('kabupaten_asal');
            $table->integer('provinsi_asal');
            $table->text('alamat');
            $table->enum('status_dosen', ['Dosen Tetap', 'Dosen Tidak Tetap']);
            $table->enum('status_aktif', ['Aktif', 'Non Aktif']);
            $table->enum('kualifikasi_akademik', ['Lulusan Pesantren', 'Setingkat S1', 'Setingkat S2', 'Setingkat S3', 'Professor']);
            $table->enum('status_kepegawaian', ['Dosen', 'Staf Administrasi', 'Staf Keuangan', 'Staf Pustakawan', 'Staf Laboran', 'Staf Lainnya']);
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
        Schema::dropIfExists('m_dosen_staf');
    }
}
