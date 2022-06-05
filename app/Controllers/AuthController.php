<?php

namespace App\Controllers;

use App\Models\UsersModel;

use CodeIgniter\Session\Session;
use Config\Services;

class AuthController extends BaseController
{

    /**
     * @var UsersModel
     */
    private $UsersModel;
    /**
     * @var session
     */
    private $session;

    public function __construct(){
        $this->UsersModel = new UsersModel;
        $this->session = session();
    }

    public function login()
    {
        $data['title'] = 'Logowanie do serwisu';
        $request = Services::request();
        if($request->getMethod(true) == 'GET'){
            if($this->session->get('is_logged')){
                return redirect()->to('panel');
            }
            return view('auth/login', $data);

        }else if($request->getMethod(true) == 'POST'){

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $password = sha1($password);
            $user_count = $this->UsersModel->where('email', $email)->where('password', $password)->countAllResults();
            if($user_count == 1){
                $udata = $this->UsersModel->where('email', $email)->where('password', $password)->get()->getResult();
                //zalogowano poprawnie
                $userdata = [
                    'email' => $email,
                    'user_id' => $udata[0]->id,
                    'name' => $udata[0]->name,
                    'is_logged' => true
                ];
                $this->session->set($userdata);
                $this->session->setFlashdata('message', 'Pomyślnie zalogowano!');
                return redirect()->to('panel');
            }else{
                $this->session->setFlashdata('error', 'Dane logowania nie zgadzają się.');
                return view('auth/login', $data);
            }

            //return view('');
        }

        return view('auth/login', $data);
    }

    public function logout(){
        if($this->session->get('is_logged')){
            $this->session->destroy();
            return redirect()->to('login');
        }
        $this->session->setFlashdata('error', 'Nie jesteś zalogowany');
        return redirect()->to('login');
    }
}
