<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 \App\Models\Prodi::create([
			'id' => 0,
			'nama_prodi' => 'Web Utama',
			'slug' => 'web-utama'
		]);
        \App\Models\Prodi::create([
			'id' => 1,
			'nama_prodi' => 'Bisnis Digital',
			'slug' => 'bisnis-digital'
		]);
		\App\Models\Prodi::create([
			'id' => 2,
			'nama_prodi' => 'Kewirausahaan',
			'slug' => 'kewirausahaan'
		]);
		\App\Models\Prodi::create([
			'id' => 3,
			'nama_prodi' => 'Sistem Informasi',
			'slug' => 'sistem-informasi'
		]);
		\App\Models\Prodi::create([
			'id' => 4,
			'nama_prodi' => 'Manajemen Retail',
			'slug' => 'manajemen-retail'
		]);
    }
}
