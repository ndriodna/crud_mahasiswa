<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class mahasiswaaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('mahasiswas')->insert([
            'nim' => '1741077',
            'jurusan_id' => '1',
            'nama' => 'Sari Dian Agusalim',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl Letjen S Parman Mal Lembuswana Bl J/6 Lt 2	',
            'tempat_lahir' => 'Samarinda',
            'tgl_lahir' => Carbon::parse('1998-01-22'),
            'thn_masuk' => '2017',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('mahasiswas')->insert([
            'nim' => '1841002',
            'jurusan_id' => '1',
            'nama' => 'Sapphira',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl Ir H Juanda 222 75117',
            'tempat_lahir' => 'bandung',
            'tgl_lahir' => Carbon::parse('1999-01-11'),
            'thn_masuk' => '2018',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('mahasiswas')->insert([
            'nim' => '1941010',
            'jurusan_id' => '2',
            'nama' => 'Budiono',
            'jenis_kelamin' => 'L',
            'alamat' => 'JL. Pahlawan, No. 8, Samarinda',
            'tempat_lahir' => 'Samarinda',
            'tgl_lahir' => Carbon::parse('2000-09-28'),
            'thn_masuk' => '2019',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('mahasiswas')->insert([
            'nim' => '2041012',
            'jurusan_id' => '6',
            'nama' => 'Hengki Setiawan',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl Sukarno Hatta Km 4/37 RT 004',
            'tempat_lahir' => 'Samarinda',
            'tgl_lahir' => Carbon::parse('2001-01-22'),
            'thn_masuk' => '2020',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('mahasiswas')->insert([
            'nim' => '2041013',
            'jurusan_id' => '5',
            'nama' => 'Otto',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl Niaga Utr Kompl Citra Niaga III Bl F-1 & F-2,Pelabuhan',
            'tempat_lahir' => 'Samarinda',
            'tgl_lahir' => Carbon::parse('2001-11-12'),
            'thn_masuk' => '2020',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
