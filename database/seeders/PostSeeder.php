<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([

            "user_id"=>1,
            "title"=>"first title",
            "short_content"=>"short content",
            "content"=>"content first",
            "photo"=>null
        ]);

        Post::create([
            "user_id"=>1,
            "title"=>"second title",
            "short_content"=>"second short content",
            "content"=>"second content first",
            "photo"=>null
        ]);
        

    }
}
