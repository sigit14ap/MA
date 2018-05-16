<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMLembagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_lembaga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lembaga',255);
            $table->integer('takhasus_id');
            $table->year('tahun_berdiri');
            $table->integer('provinsi_id');
            $table->integer('kabupaten_id');
            $table->text('alamat');
            $table->string('no_telpon',50);
            $table->string('fax',50);
            $table->string('email',255);
            $table->string('website',100);
            $table->string('nama_mudir',100);
            $table->double('luas_tanah');
            $table->integer('status');
            $table->integer('pesantren_id');
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
        Schema::dropIfExists('m_lembaga');
    }
}
