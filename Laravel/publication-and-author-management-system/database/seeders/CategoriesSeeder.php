<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'name' => 'Fiction',

            ],
            [
                'name' => 'Non-Fiction',

            ],
            [
                'name' => 'Romance',

            ],
            [
                'name' => 'Research',

            ],



        ];

        DB::table('categories')->insert($category);
    }
}
