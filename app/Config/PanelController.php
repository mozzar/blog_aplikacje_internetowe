<?php

namespace App\Controllers;

use App\Models\PostsModel;
use Config\Services;

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
    }


    public function index(): string
    {
        $data['title'] = 'Panel Serwisu';
        $data['posts'] = $this->PostsModel->where('deleted_at', null)->get()->getResult();


        return view('blog/panel', $data);

    }

    public function post()
    {
        if($this->request->getMethod() == 'get'){
            return view('blog/post_add');
        }
        else if($this->request->getMethod() == "post"){
            $title = $this->request->getPost('title');
            $description = $this->request->getPost('description');
            $content = $this->request->getPost('content');
            $created_at = date("Y-m-d H:i:s");
            $add = $this->PostsModel
                ->set('title', $title)
                ->set('description', $description)
                ->set('content', $content)
                ->set('created_at', $created_at)
                ->insert();
            if($add){
                $this->session->setFlashdata('message',
                    'Pomyślnie dodano nowy post!');
            }else{
                $this->session->setFlashdata('message',
                    'Wystapil blad podczas dodania!');
            }
        }
        else if($this->request->getMethod() == 'delete'){
            $id = $this->request->getPost('id');
            $del = $this->PostsModel
                ->set('deleted_at',  date("Y-m-d H:i:s"))
                ->where('id', $id)->update();
            if($del){
                $this->session->setFlashdata('message',
                    'Pomyślnie usunięto post o ID ' . $id);
            }else{
                $this->session->setFlashdata('message',
                    'Wystapil blad podczas usuwania posta o ID '. $id);
            }

        }
        return redirect('blog/panel');
    }

}
