<?php

use App\Controller\HomeController;

$this->get('/', [HomeController::class, 'index']);

$this->get('home', [HomeController::class, 'home']);

$this->get('teste', function () {
    echo 'Estou na Teste!!!';
});

$this->get('teste/user', function () {
    echo 'Estou na User!!!';
});