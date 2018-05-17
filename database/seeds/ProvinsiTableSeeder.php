<?php

use Illuminate\Database\Seeder;

class ProvinsiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
        [
            ['id'=>11,'nama_provinsi'=>'Aceh'],
            ['id'=>12,'nama_provinsi'=>'Sumatera Utara'],
            ['id'=>13,'nama_provinsi'=>'Sumatera Barat'],
            ['id'=>14,'nama_provinsi'=>'Riau'],
            ['id'=>15,'nama_provinsi'=>'Jambi'],
            ['id'=>16,'nama_provinsi'=>'Sumatera Selatan'],
            ['id'=>17,'nama_provinsi'=>'Bengkulu'],
            ['id'=>18,'nama_provinsi'=>'Lampung'],
            ['id'=>19,'nama_provinsi'=>'Bangka Belitung'],
            ['id'=>21,'nama_provinsi'=>'Kepulauan Riau'],
            ['id'=>31,'nama_provinsi'=>'DKI Jakarta'],
            ['id'=>32,'nama_provinsi'=>'Jawa Barat'],
            ['id'=>33,'nama_provinsi'=>'Jawa Tengah'],
            ['id'=>34,'nama_provinsi'=>'DI Yogyakarta'],
            ['id'=>35,'nama_provinsi'=>'Jawa Timur'],
            ['id'=>36,'nama_provinsi'=>'Banten'],
            ['id'=>51,'nama_provinsi'=>'Bali'],
            ['id'=>52,'nama_provinsi'=>'Nusa Tenggara Barat'],
            ['id'=>53,'nama_provinsi'=>'Nusa Tenggara Timur'],
            ['id'=>61,'nama_provinsi'=>'Kalimantan Barat'],
            ['id'=>62,'nama_provinsi'=>'Kalimantan Tengah'],
            ['id'=>63,'nama_provinsi'=>'Kalimantan Selatan'],
            ['id'=>64,'nama_provinsi'=>'Kalimantan Timur'],
            ['id'=>65,'nama_provinsi'=>'Kalimantan Utara'],
            ['id'=>71,'nama_provinsi'=>'Sulawesi Utara'],
            ['id'=>72,'nama_provinsi'=>'Sulawesi Tengah'],
            ['id'=>73,'nama_provinsi'=>'Sulawesi Selatan'],
            ['id'=>74,'nama_provinsi'=>'Sulawesi Tenggara'],
            ['id'=>75,'nama_provinsi'=>'Gorontalo'],
            ['id'=>76,'nama_provinsi'=>'Sulawesi Barat'],
            ['id'=>81,'nama_provinsi'=>'Maluku'],
            ['id'=>82,'nama_provinsi'=>'Maluku Utara'],
            ['id'=>91,'nama_provinsi'=>'Papua'],
            ['id'=>92,'nama_provinsi'=>'Papua Barat'],
        ];
        DB::table('ref_provinsi')->insert($data);
    }
}
