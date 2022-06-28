<?php
namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model{


    protected $table      = 'posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields =
        ['title', 'description', 'content', 'deleted_at', 'edited_at', 'created_at', 'user_id', 'slug', 'image_name'];



    public function getPostCategories(int $id){
        return $this->db->table('category_posts')
            ->select('*')
            ->where('category_posts.post_id', $id)
            ->join('category', 'category_posts.category_id=category.id')
            ->get()->getResult();
    }

    public function getPostsByCategory(int $id){
        return $this->db->table('category_posts')
            ->select('*, users.name as author, posts.id as post_id')
            ->where('category_posts.category_id', $id)
            ->join('posts', 'category_posts.post_id = posts.id')
            ->join('users', 'posts.user_id = users.id')
            ->get()->getResult();
    }


}