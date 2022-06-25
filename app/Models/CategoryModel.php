<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model{


    protected $table      = 'category';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $allowedFields =
        ['category_name', 'category_description', 'color'];




}