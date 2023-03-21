<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $list_category = [
            ['ten_tloai'=>"Nhạc trữ tình"],
            ['ten_tloai'=>"Nhạc quê hương"],
            ['ten_tloai'=>"Nhạc thiếu nhi"],
            ['ten_tloai'=>"Pop"],
            ['ten_tloai'=>"Rock"],
            ['ten_tloai'=>"R&R"]];

        DB::table('categories')->delete();    //xóa tat ca bn ghi hien co trong bang

        foreach($list_category as $category){
            Category::insert($category);
        }
    }
}
