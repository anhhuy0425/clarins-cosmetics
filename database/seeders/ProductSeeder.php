<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); // Khởi tạo Faker

        // Giả sử bạn muốn tạo 50 sản phẩm
        for ($i = 0; $i < 50; $i++) {
            DB::table('products')->insert([
                'product_name' => $faker->word,
                'price' => $faker->randomFloat(2, 100, 500),
                'image' => 'https://via.placeholder.com/370x450.png?text=Product+Image+' . Str::random(5),
                'description' => $faker->paragraph,
                'category_id' => $faker->numberBetween(1, 10), // Chọn ngẫu nhiên một danh mục từ 1 đến 10
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
