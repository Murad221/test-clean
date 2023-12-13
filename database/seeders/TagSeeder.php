<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ["name" => 'Marketing'],
            ["name" => 'Design'],
            ["name" => 'Php laravel'],
            ["name" => 'Python'],
            ["name" => 'OOP'],


        ];

        Tag::insert($tags);
    }
}
