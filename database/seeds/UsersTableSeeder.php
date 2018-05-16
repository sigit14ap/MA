<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'pusat','email' => 'pusat@gmail.com','password' => bcrypt('mahad@123'),'photo_path' => 'user.png','telepon' => '08123456789','role' => 'pusat','lembaga_id' => 0,'created_by' => 1, 'updated_by' => 1),

            array('name' => 'pdma','email' => 'pdma@gmail.com','password' => bcrypt('mahad@123'),'photo_path' => 'user.png','telepon' => '08123456789','role' => 'pdma','lembaga_id' => 0,'created_by' => 1, 'updated_by' => 1),

            array('name' => 'lembaga','email' => 'lembaga@gmail.com','password' => bcrypt('mahad@123'),'photo_path' => 'user.png','telepon' => '08123456789','role' => 'lembaga','lembaga_id' => 1,'created_by' => 1, 'updated_by' => 1),
        );

        DB::table('users')->insert($data);
    }
}
