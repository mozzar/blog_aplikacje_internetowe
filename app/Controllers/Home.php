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


    public function all_posts(){
        $post_per_page = 5;
        $data['title'] = "Blog ./MoZZar - Wszystkie posty";
        $post_count = $this->PostsModel
            ->where('deleted_at', null)->countAllResults();
        $pages = ceil($post_count/$post_per_page);
        if(!empty($this->request->getGet('page'))){
            $page_requested = $this->request->getGet('page');

            if($page_requested <= $pages && $page_requested > 0){
                $data['posts'] = $this->PostsModel
                    ->select('*, posts.id as id')
                    ->where('deleted_at', null)
                    ->join('users', 'user_id = users.id')
                    ->orderBy('posts.created_at', 'DESC')
                    ->limit($post_per_page, $post_per_page*$page_requested)
                    ->get()->getResult();
                $data['max_page'] = $pages;
                $data['page'] = $page_requested;
                return view('blog/panel', $data);
            }else{
                session()->setFlashdata('error', 'Taka strona nie istnieje!');
            }

        }

        $data['posts'] = $this->PostsModel
            ->select('*, posts.id as id')
            ->where('deleted_at', null)
            ->join('users', 'user_id = users.id')
            ->limit($post_per_page)
            ->orderBy('created_at', 'DESC')
            ->get()->getResult();
        $data['page'] = 0;
        $data['max_page'] = $pages;
        return view('posts/posts_view', $data);
    }

    public function categories(){
        $data['title'] = 'Blog ./MoZZar - Kategorie postów';
        $data['categories'] = $this->CategoryModel->findAll();
        $count_cat = count($data['categories']);

        foreach($data['categories'] as $index => $value){
            /*print_r($index);
            print_r($value['id']);
            echo "</br>";*/

            $data['categories'][$index]['posts'] = $this->PostsModel->getPostsByCategory($value['id']);

        }

        return view('posts/category_view', $data);
    }


}
