<?php

namespace Core;

use Jenssegers\Blade\Blade;
use Core\Input;

class Controller
{
    protected static function view(string $view, $params = [])
    {
        $blade = new Blade('./App/View/', './Cache/view/');

        echo $blade->make($view, $params)->render();
    }

    public static function get(string $param, string $filter)
    {
        return filter_input(INPUT_GET, $param, $filter);
    }

    public static function post(string $param, string $filter)
    {
        return filter_input(INPUT_POST, $param, $filter);
    }
}
