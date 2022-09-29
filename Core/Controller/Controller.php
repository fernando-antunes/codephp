<?php

namespace Core\Controller;

use Jenssegers\Blade\Blade;

class Controller
{
    protected static function view(string $view, $params = [])
    {
        $blade = new Blade('./App/View/', './Cache/view/');

        echo $blade->make($view, $params)->render();
    }
}
