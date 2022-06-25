<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PostsModel;

class Home extends BaseController
{
    public function __construct(){
        $this->PostsModel = new PostsModel();
        $this->CategoryModel = new CategoryModel();
    }

    public function index()
    {

        $data['title'] = 'Blog ./MoZZar Strona Główna';
        $data['posts'] = $this->PostsModel
            ->select('*, posts.id as id')
            ->limit(6)
            ->orderBy('created_at', 'DESC')
            ->where('deleted_at', null)
            ->join('category_posts', 'category_posts.post_id = posts.id')
            ->join('category', 'category_posts.category_id = category.id')
            ->get()->getResult();
        return view('index', $data);
    }

    public function post($id)
    {
        $data['post'] = $this->PostsModel
            ->where('posts.id', $id)
            ->join('category_posts', 'category_posts.post_id = posts.id')
            ->join('category', 'category_posts.category_id = category.id')
            ->get()->getResult();
        $data['title'] = "Blog ./MoZZar - " . $data['post'][0]->slug;
        return view('posts/post_view', $data);
    }


    public function categories(){
        $data['title'] = 'Blog ./MoZZar - Kategorie postów';
        $data['categories'] = $this->CategoryModel->findAll();
        $count_cat = count($data['categories']);



        return view('posts/category_view', $data);
    }


}
