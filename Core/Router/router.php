<?php

namespace Core;

use App\Controller\HomeController;

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

    private function inicializer()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $request_uri = $_SERVER['REQUEST_URI'];

        //Pega a primeira e a segunda posição da URI que seriam a 1-controller e a 2-method
        $this->uri = segment_array([1, 2], []);
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
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
        //Pega as rotas definidas
        foreach ($this->getArr as $get) {

            //Pega as functions da class
            $class = get_class_methods((new $get['call'][0]));

            //Verifica se a rota digitada esta nas definidas
            if ($get['router'] == segment_array([1, 2], [], '/')) {
                //Faz a busca da function na class
                if (array_search($get['call'][1], $class)) {
                    //Chama a call que esta sendo requisitada
                    call_user_func(array(new $get['call'][0], $get['call'][1]));
                    break;
                }
            }
        }
    }
}
