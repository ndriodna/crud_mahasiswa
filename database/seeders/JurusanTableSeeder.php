<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusans')->insert([
            'id' => '1',
            'kd_jurusan' => 'SC01',
            'nama_jurusan' => 'Teknik Sipil',
            'akreditasi' => 'A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('jurusans')->insert([
            'id' => '2',
            'kd_jurusan' => 'SI02',
            'nama_jurusan' => 'Sistem Informasi',
            'akreditasi' => 'A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
          DB::table('jurusans')->insert([
            'id' => '3',
            'kd_jurusan' => 'SJ01	',
            'nama_jurusan' => 'Sastra Jepang',
            'akreditasi' => 'A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
           DB::table('jurusans')->insert([
            'id' => '4',
            'kd_jurusan' => 'ST02	',
            'nama_jurusan' => 'Statistika',
            'akreditasi' => 'B',
            'created_at' => now(),
            'updated_at' => now()
        ]);
            DB::table('jurusans')->insert([
            'id' => '5',
            'kd_jurusan' => 'TI01',
            'nama_jurusan' => 'Teknik Informatika',
            'akreditasi' => 'A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
             DB::table('jurusans')->insert([
            'id' => '6',
            'kd_jurusan' => 'TP02',
            'nama_jurusan' => 'Teknologi Pangan',
            'akreditasi' => 'A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
