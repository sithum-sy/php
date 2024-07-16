<?php

namespace Database\Seeders;

use App\Models\publication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => "Fiction"
            ],
            [
                'id' => 2,
                'name' => "Romance"
            ],
            [
                'id' => 3,
                'name' => "Children"
            ],
            [
                'id' => 4,
                'name' => "Scientific"
            ],
            [
                'id' => 5,
                'name' => "Drama"
            ],

        ];

        DB::table('categories')->insert($category);
    }
}
