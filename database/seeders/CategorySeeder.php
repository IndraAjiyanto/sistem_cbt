<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'progammning',
                'slug' => 'progammning',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'desain',
                'slug' => 'desain',
                'created_at' => Carbon::now(),
                'update_at' => Carbon::now()
            ],
            [
                'name' => 'digital marketing',
                'slug' => 'digital-marketing',
                'created_at' => Carbon::now(),
                'update_at' => Carbon::now()
            ]
        ]);
    }
}
