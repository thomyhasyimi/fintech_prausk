<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Makanan',
        ]);

        Category::create([
            'name' => 'Minuman',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => "Seblak",
            'photo' => 'https://source.unsplash.com/random/900×900/?seblak',
            'desc' => "Enak Banget",
            'stock' => 25,
            'price' => 15000,
        ]);
        Product::create([
            'category_id' => 1,
            'name' => "Ramen",
            'photo' => 'https://source.unsplash.com/random/900×900/?ramen',
            'desc' => "Enak Banget",
            'stock' => 25,
            'price' => 15000,
        ]);
        Product::create([
            'category_id' => 2,
            'name' => "Mojito",
            'photo' => 'https://source.unsplash.com/random/900×900/?mojito',
            'desc' => "Enak Banget",
            'stock' => 25,
            'price' => 1000,
        ]);

        User::create([
            'name' => 'kantin',
            'email' => 'kantin@gmail.com',
            'role' => 'kantin',
            'password' => 'kantinaja',
        ]);
        User::create([
            'name' => 'tom',
            'email' => 'tom@gmail.com',
            'role' => 'siswa',
            'password' => 'tomiaja',
        ]);
        User::create([
            'name' => 'raya',
            'email' => 'raya@gmail.com',
            'role' => 'siswa',
            'password' => 'rayaaja',
        ]);
        User::create([
            'name' => 'bank',
            'email' => 'bank@gmail.com',
            'role' => 'bank',
            'password' => 'bankaja',
        ]);
    }
}
