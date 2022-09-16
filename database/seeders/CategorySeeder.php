<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'cat_name' => 'Snack',
            'cat_description' => 'Makanan ringan, camilan atau kudapan adalah istilah makanan yang bukan merupakan menu utama'
        ]);
        DB::table('category')->insert([
            'cat_name' => 'Main Course',
            'cat_description' => 'makanan yang dimakan pada saat menu utama'
        ]);
    }
}
