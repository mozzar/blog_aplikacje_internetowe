<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExampleData extends Seeder
{
    public function run()
    {
       $this->call("UsersSeeder");
       $this->call("PostsSeeder");
       $this->call("CategorySeeder");

       //zseedowanie category_post
        $posts = $this->db->table('posts')->get()->getResult();
        $cats = $this->db->table('category')->get()->getResult();
        $cats_max = count($cats);

        foreach($posts as $post){
            $cat_id = rand(1, $cats_max);
            $this->db->table('category_posts')
                ->set('category_id', $cat_id)
                ->set('post_id', $post->id)
                ->insert();
        }


    }
}