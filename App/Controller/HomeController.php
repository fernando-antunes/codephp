<?php

namespace App\Controller;

class HomeController
{
    public function __construct()
    {
        echo 'estamos aqui!';
    }

    public function teste(){
        return ['nome' => 'Fernando'];
    }
}
