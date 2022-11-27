<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organisasi;
use App\Models\Category;
use App\Models\Join;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'username' => 'tes',
            'email' => 'test@example.com',
            'password' => Hash::make('12345')
        ]);
        
        \App\Models\Admin::factory()->create([
            'name' => 'Test Admin',
            'username' => 'tes',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345')
        ]);

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

        Organisasi::factory()->create([
            'name' => 'UKM Robotika',
            'category_id' => '2',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => ''
        ]);
        
        Organisasi::factory()->create([
            'name' => 'UKM Basket',
            'category_id' => '2',
            'desc' => 'UKM yang dibentuk sebagai wadah untuk menampung minat dan bakat mahasiswa Politeknik Elektronika Negeri Surabaya khususnya 
                        di bidang olahraga basket UKM ini bukan hanya sebagai sarana penyalur hobi basket, namun mendorong mahasiswa untuk berprestasi 
                        di bidang olahraga basket baik di tingkat regional maupun nasional.',
            'visi' => 'Menyalurkan minat dan bakat mahasiswa Politeknik Elektronika Negeri Surabaya dalam bidang olahraga bola basket dan 
                        menjadi sarana untuk pengembangan diri menuju pribadi yang lebih baik.',
            'misi' => '1. Mengembangkan bakat dalam permainan bola basket melalui latihan dan kompetisi
                        2. Membangun unit kegiatan mahasiswa yang aktif dan berguna bagi Politeknik Elektronika Negeri Surabaya',
            'photo_url' => '/organisasi-photos/basket.png'
        ]);
        
        Organisasi::factory()->create([
            'name' => 'UKM Futsal',
            'category_id' => '2',
            'desc' => 'UKM Futsal adalah jenis UKM yang bergerak di bidang olahraga terutama bola (futsal). 
                        UKM ini hanya mengikuti kegiatan-kegiatan yang ada guna menyalurkan minat dan bakat mahasiswa. 
                        UKM futsal dapat mengembangkan bakat dan minat olahraga futsal di lingkungan Politeknik Elektronika Negeri Surabaya. 
                        Kegiatan dari UKM Futsal antara lain melaksanakan latihan futsal secara rutin serta mengikuti kompetisi-kompetisi futsal dalam skala regional dan nasional.',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => ''
        ]);
        
        Organisasi::factory()->create([
            'name' => 'UKM Badminton',
            'category_id' => '2',
            'desc' => 'UKM Badminton adalah salah satu Unit Kegiatan Mahasiswa yang ada di Politeknik Elektronika Negeri Surabaya. 
                        UKM Badminton itu sendiri dibuat untuk menyalurkan bakat-bakat mahasiswa. Tidak hanya itu, di UKM tersebut 
                        juga menerima mahasiswa yang ingin bergabung untuk belajar dan berolahraga agar bakat dan hobby nya dapat 
                        tersalurkan dari UKM ini serta terciptanya mahasiswa PENS yang berkarakter dan unggul dalam Prestasi di bidang olahraga bulutangkis.',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => '/organisasi-photos/badminton.jpg'
        ]);

        Organisasi::factory()->create([
            'name' => 'UKM Fotografi',
            'category_id' => '2',
            'desc' => 'ini deskripsi himpunan',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => ''
        ]);
        Organisasi::factory()->create([
            'name' => 'UKM Tari',
            'category_id' => '2',
            'desc' => 'UKM Tari merupakan suatu wadah seni yang bertujuan untuk melestarikan seni budaya serta menghimpun dan menyalurkan minat dan bakat 
                        dari mahasiswa dalam bidang seni sehingga nantinya dapat bermanfaat. Melalui visinya “mewujudkan dan melestarikan seni dan budaya” 
                        UKM Kesenian Daerah menjadi satu-satunya UKM yang bergerak dalam pelestarian seni khususnya seni tari 
                        yang ada di Politeknik Elektronika Negeri Surabaya. UKM tari berada di bawah naungan BEM PENS. ',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => ''
        ]);

        Organisasi::factory()->create([
            'name' => 'UKM Music',
            'category_id' => '2',
            'desc' => 'UKM Musik adalah jenis UKM yang bergerak di bidang seni musik terutama. UKM ini hanya mengikuti kegiatan-kegiatan yang 
                        ada guna menyalurkan minat dan bakat mahasiswa. UKM musik dapat mengembangkan bakat dan minat di lingkungan Politeknik Elektronika Negeri Surabaya.
                        Kegiatan dari UKM musik antara lain melaksanakan latihan secara rutin serta mengikuti kompetisi-kompetisi musik dalam skala regional dan nasional.',
            'visi' => 'ini visi himpunan',
            'misi' => 'ini misi himpunan',
            'photo_url' => ''
        ]);

        Category::create([
            'name' => 'Komunitas',
        ]);

        Join::create([
            'user_id' => 1,
            'organisasi_id' => 1,
            'status' => true
        ]);

        Jurusan::create([
            'name' => 'Teknik Informatika'
        ]);
        Jurusan::create([
            'name' => 'Teknik Elektronika'
        ]);
    }
}
