<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateKategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Isi dengan logika untuk memasukkan data ke tabel
        Kategori::create([
            'id_kategori' =>'KTG01',
            'nama_kategori' => 'Networking',
        ]);

        Kategori::create([
            'id_kategori' =>'KTG02',
            'nama_kategori' => 'Web Developer',
        ]);

        Kategori::create([
            'id_kategori' =>'KTG03',
            'nama_kategori' => 'UI / UX',
        ]);
    }
}
