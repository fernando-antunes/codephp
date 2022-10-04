<?php

namespace Core;



class Router
{

    private $uri;
    private $method;
    private $getArr = [];

    public function __construct()
    {
        //Inicializa os REQUEST's
        $this->inicializer();

        //Chama as rotas criadas
        require_once('./App/Config/Router.php');

        //Executa as rotas
        $this->execute();
    }

    private function mensage($mensage)
    {
        include('./Core/Language/' . LANGUAGE . '/router.php');

        echo $languageRouter[$mensage];

        exit;
    }

    private function inicializer()
    {
        //Captura o uri e method
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    private function get($router, $call, $method)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call,
            'method' => $method
        ];
    }

    private function execute()
    {
        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;

            case 'POST':

                break;

            default:
                # code...
                break;
        }
    }

    private function executeGet()
    {

        //Pega os parametros GET recebido
        $params_get = segment_array([], [0, 1], ',');

        //Pega a rota
        if (segment(1) != '') {
            $router = segment(1);
        } else {
            $router = '/';
        }

        foreach ($this->getArr as $val) {
            if ($router == $val['router']) {
                $controller_name = $val['call'];
                $controller_function = $val['method'];
            }
        }

        //Verifica se não esta vazio o $method
        if (empty($controller_name)) {
            $this->mensage('RouterNotExist');
        }

        //Chama a controller
        $controller = "\\App\\Controller\\" . $controller_name;
        $instance = new $controller;

        //Verifica se a function selecionada existe
        if (!is_callable(array($instance, $controller_function))) {
            $this->mensage('FunctionNotFound');
        }

        return call_user_func_array([$instance, $controller_function], [$params_get]);
    }
}
