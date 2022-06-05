<?php

namespace App\Controllers;

use App\Models\PostsModel;

class Home extends BaseController
{
    public function __construct(){
        $this->PostsModel = new PostsModel();
    }

    public function index()
    {

        $data['title'] = 'Blog ./MoZZar Strona Główna';
        $data['posts'] = $this->PostsModel
            ->limit(6)
            ->orderBy('created_at', 'DESC')
            ->where('deleted_at', null)
            ->get()->getResult();
        return view('index', $data);
    }

    public function post($id)
    {

        $data['post'] = $this->PostsModel->where('id', $id)->get()->getResult();

        $data['title'] = "Blog ./MoZZar - " . $data['post'][0]->slug;
        return view('posts/post_view', $data);

    }
}
