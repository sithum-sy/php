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
                'id' => 1,
                'name' => 'Fiction',

            ],
            [
                'id' => 2,

                'name' => 'Non-Fiction',

            ],
            [
                'id' => 3,

                'name' => 'Romance',

            ],
            [
                'id' => 4,

                'name' => 'Research',

            ],



        ];

        DB::table('categories')->insert($category);
    }
}
