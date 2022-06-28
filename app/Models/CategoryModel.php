<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model{


    protected $table      = 'category';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields =
        ['category_name', 'category_description', 'color'];


    public function addToCategoryRelation($category_id, $post_id){
        $this->db->table('category_posts')->insert(
            [
                'category_id' => $category_id,
                'post_id' => $post_id
            ]
        );
    }


}