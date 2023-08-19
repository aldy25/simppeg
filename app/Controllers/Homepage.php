<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function index()
    {
        $session = \config\services::session();
        $login = $session->get('login');
        if (empty($login)) {

            $data = ['title' => 'Halaman Login'];
            return view('Auth/Login', $data);
        } else {
            $data = [
                'title' => 'Beranda Sistem',
                'page' => 'Beranda'
            ];
            return view('Page/Beranda', $data);
        }
    }
}
