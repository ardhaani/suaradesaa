<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lapor;
use App\Models\Post;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Post::factory(15)->create();

        // User::create([
        //     'name' => 'Administrator',
        //     'username' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'level' => 'admin'
        // ]);
        // User::create([
        //     'name' => 'Petugas',
        //     'username' => 'petugas',
        //     'email' => 'petugas@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'level' => 'petugas'
        // ]);
        // User::create([
        //     'name' => 'Rio',
        //     'username' => 'riotri',
        //     'email' => 'rio@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'NIK' => '1234567887654321'
        // ]);
        // // User::create([
        // //     'name' => 'Rui',
        // //     'username' => 'ruirui',
        // //     'email' => 'rui@gmail.com',
        // //     'password' => bcrypt('12345'),
        // //     'NIK' => '1234567887654322'
        // // ]);
        Category::create([
            'name' => 'Pelayanan',
            'slug' => 'pelayanan'
        ]);
        Category::create([
            'name' => 'Infrastruktur',
            'slug' => 'infrastruktur'
        ]);
        Category::create([
            'name' => 'Lainnya',
            'slug' => 'lainnya'
        ]);
        // Status::create([
        //     'name' => 'Diterima',
        //     'slug' => 'diterima'
        // ]);
        // Status::create([
        //     'name' => 'Diproses',
        //     'slug' => 'diproses'
        // ]);
        // Status::create([
        //     'name' => 'Selesai',
        //     'slug' => 'selesai'
        // ]);
        // Status::create([
        //     'name' => 'Ditolak',
        //     'slug' => 'ditolak'
        // ]);
    }
}
