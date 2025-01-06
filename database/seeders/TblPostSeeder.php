<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblPostSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_posts')->insert([
            [
                'title' => 'Post Pertama',
                'slug' => 'post-pertama',
                'user_id' => 1,
                'content' => 'Ini adalah konten dari post pertama.',
                'image' => 'post1.jpg',
                'hits' => 0,
                'aktif' => 1,
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Post Kedua',
                'slug' => 'post-kedua',
                'user_id' => 1,
                'content' => 'Ini adalah konten dari post kedua.',
                'image' => 'post2.jpg',
                'hits' => 0,
                'aktif' => 1,
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Post Ketiga',
                'slug' => 'post-ketiga',
                'user_id' => 2,
                'content' => 'Ini adalah konten dari post ketiga.',
                'image' => 'post3.jpg',
                'hits' => 0,
                'aktif' => 1,
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
