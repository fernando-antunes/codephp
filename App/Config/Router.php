<?php

$this->get('/', function () {
    echo 'Estou na index!!!';
});

$this->get('home', function () {
    echo 'Estou na Home!!!';
});

$this->get('teste', function () {
    echo 'Estou na Teste!!!';
});

$this->get('teste/user', function () {
    echo 'Estou na User!!!';
});