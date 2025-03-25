<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Course;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // for ($i = 0; $i < 10; $i++) { 
        //     Category::query()->create([
        //         'name' => 'Danh Mục ' . $i
        //     ]);
        // }
        
        // for ($i = 0; $i < 10; $i++) { 
        //     Tag::query()->create([
        //         'name' => 'Tag ' . $i
        //     ]);
        // }
        for ($i = 0; $i < 5; $i++) { 
            Course::query()->create([
                'title' => 'Danh Mục ' . $i,
                'description' => 'Mo ta ' . $i,
                'introduction' => 'Gioi thieu ' . $i,
                'price' => 100000 * ($i + 1) // Thêm giá trị price
            ]);
        }
      
    }
}
