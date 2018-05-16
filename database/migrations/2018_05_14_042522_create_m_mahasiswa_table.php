<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap',100);
            $table->string('tempat_lahir',100);
            $table->date('tanggal_lahir');
            $table->integer('mukim');
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->string('negara_asal',100);
            $table->integer('kabupaten_asal');
            $table->integer('provinsi_asal');
            $table->text('alamat');
            $table->string('asal_pendidikan',50);
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
        Schema::dropIfExists('m_mahasiswa');
    }
}
