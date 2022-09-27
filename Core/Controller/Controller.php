<?php

namespace Core\Controller;

class Controller
{
    protected static function view(string $view, $params = [])
    {
        echo file_get_contents('../View/' . $view . '.php');
    }
}
