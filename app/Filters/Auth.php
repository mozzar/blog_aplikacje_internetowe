<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if(!$session->get('is_logged')){
            if($request->getMethod(true) == "GET"){
                return redirect()->to('login');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}
