<?php
namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model{


    protected $table      = 'posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields =
        ['title', 'description', 'content', 'deleted_at', 'created_at', 'user_id', 'slug', 'image_name'];




}