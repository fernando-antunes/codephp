<?php

namespace App\Controller;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home');
    }

    public function home($numero, $nome)
    {
        echo 'teste da home com numero ' . $numero . ' e nome ' . $nome;
    }

    public function teste()
    {
        echo 'esta no teste';
    }
}
