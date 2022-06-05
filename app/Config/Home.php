<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Strona serwisu';
        return view('index', $data);
    }
}
