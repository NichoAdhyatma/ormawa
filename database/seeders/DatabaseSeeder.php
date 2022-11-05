<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organisasi;
use App\Models\Category;
use App\Models\Join;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Organisasi::factory()->create([
            'name' => 'Himpunan Mahasiswa Teknik Informatika',
            'category_id' => '1',
            'slug' => 'HIMIT',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/HIMIT.png',
            'url' => 'https://it.hima.pens.ac.id/'
        ]);

        Organisasi::factory()->create([
            'name' => 'Himpunan Mahasiswa Teknik Elektronika',
            'slug' => 'HIMA ELKA',
            'category_id' => '1',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/HIMELIN.png',
            'url' => 'http://elka.hima.pens.ac.id/'
        ]);

        Organisasi::factory()->create([
            'name' => 'Himpunan Mahasiswa Teknik Mekatronika',
            'slug' => 'HIMA MEKA',
            'category_id' => '1',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/HIMEKA.png'
        ]);

        Organisasi::factory()->create([
            'name' => 'Himpunan Mahasiswa Teknik Telekomunikasi',
            'slug' => 'HIMA TELKOM',
            'category_id' => '1',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/HIMTELKOM.png'
        ]);

        Organisasi::factory()->create([
            'name' => 'Himpunan Mahasiswa Multimedia Broadcasting',
            'slug' => 'HIMA MMB',
            'category_id' => '1',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/MMB.png'
        ]);

        Organisasi::factory()->create([
            'name' => 'Himpunan Mahasiswa Teknik Komputer',
            'slug' => 'HMCE',
            'category_id' => '1',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/HMCE.png'
        ]);

        Organisasi::factory()->create([
            'name' => 'Himpunan Mahasiswa Teknik Elektro Industri',
            'slug' => 'HIMA ELIN',
            'category_id' => '1',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/HIMELKA.png'
        ]);

        Organisasi::factory()->create([
            'name' => 'UKM Robotika',
            'category_id' => '2',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => ''
        ]);
        
        Category::create([
            'name' => 'Himpunan Mahasiswa',
            'slug' => 'HIMA'

        ]);
        Category::create([
            'name' => 'Unit Kegiatan Mahasiswa',
            'slug' => 'UKM'
        ]);

        Category::create([
            'name' => 'Badan Eksekutif Mahasiswa',
            'slug' => 'BEM'
        ]);

        Category::create([
            'name' => 'Komunitas',
        ]);

        Join::create([
            'user_id' => 1,
            'organisasi_id' => 1,
            'status' => true
        ]);
    }
}
