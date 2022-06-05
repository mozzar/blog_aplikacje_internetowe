<?php

namespace App\Controllers;

use App\Models\PostsModel;
use App\Models\UsersModel;
use Config\Services;
use Couchbase\User;

class PanelController extends BaseController
{

    /**
     * @var PostsModel
     */
    private $PostsModel;
    /**
     * @var \CodeIgniter\Session\Session|mixed|null
     */
    private $session;

    public function __construct()
    {
        $this->session = session();
        $this->PostsModel = new PostsModel();
        $this->UsersModel = new UsersModel();
    }


    public function index(): string
    {
        $post_per_page = 5;
        $data['title'] = 'Panel Serwisu';
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
                $this->session->setFlashdata('error', 'Taka strona nie istnieje!');
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
        return view('blog/panel', $data);

    }

    public function post()
    {
        $data['title'] = 'Dodawanie nowego posta';
        if($this->request->getMethod() == 'get'){

            return view('blog/post_add', $data);
        }
        else if($this->request->getMethod() == "post"){
            $title = $this->request->getPost('title');
            $description = $this->request->getPost('description');
            $content = $this->request->getPost('content');
            $slug = $this->request->getPost('slug');
            $user_id = session()->get('user_id');
            $created_at = date("Y-m-d H:i:s");
            $data = [
                'title' => $title,
                'description' => $description,
                'slug' => $slug,
                'content' => $content,
                'user_id' => $user_id,
                'created_at' => $created_at
            ];
            $add = $this->PostsModel->insert($data);
            if($add){
                $this->session->setFlashdata('message',
                    'Pomyślnie dodano nowy post!');
            }else{
                $this->session->setFlashdata('message',
                    'Wystapił blad podczas dodania!');
            }
        }

        return redirect()->to('/panel');
    }


    public function delete_update($id){
        if($this->request->getMethod() == 'delete'){

            $del = $this->PostsModel
                ->set('deleted_at',  date("Y-m-d H:i:s"))
                ->where('id', $id)->update();
            if($del){
                $this->session->setFlashdata('message',
                    'Pomyślnie usunięto post o ID ' . $id);
                $data = [
                    'message' => 'Pomyślnie usunięto post o ID ' . $id
                ];
            }else{
                $this->session->setFlashdata('message',
                    'Wystapil blad podczas usuwania posta o ID '. $id);
                $data = [
                    'message' => 'Wystapil blad podczas usuwania posta o ID '. $id
                ];
            }
            return $this->response->setJSON($data);
        }




    }


}
