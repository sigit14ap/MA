<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPesantrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pesantren', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pondok_pesantren',255);
            $table->string('nama_yayasan',255);
            $table->integer('takhasus_id');
            $table->year('tahun_berdiri');
            $table->integer('jumlah_santri_lk');
            $table->integer('jumlah_santri_pr');
            $table->string('nama_pengasuh',100);
            $table->string('nama_ketua_yayasan',100);
            $table->integer('provinsi_id');
            $table->integer('kabupaten_id');
            $table->text('alamat');
            $table->string('no_telp',50);
            $table->string('fax',50);
            $table->string('email',100);
            $table->string('website',100);
            $table->double('luas_tanah');
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
        Schema::dropIfExists('m_pesantren');
    }
}
