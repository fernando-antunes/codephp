<?php

//Para chamar uma rota e necessario 4 parametros
//1 - Tipo de requisição - GET, POST, PUT, DELETE
//2 - O nome da rota, não obrigatorio ser o mesmo nome da FUNCTION da controller
//3 - O nome da controller que esta sendo requisitada a FUNCTION
//4 - O nome da FUNCTION que esta sendo requisitada
//Exemplo: 
//$this->get('ClienteCadastro', 'ClienteController', 'cadastro');

$this->get('/', 'HomeController', 'index');

$this->get('inicio', 'HomeController', 'home');

$this->get('testes', 'HomeController', 'teste');