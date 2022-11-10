<?php

namespace Core;

class Input
{

    public Input $input;

    public  function __construct()
    {
    }

    public function get(string $param, string $filter)
    {
        return filter_input(INPUT_GET, $param, $filter);
    }

    public function post(string $param, string $filter)
    {
        return filter_input(INPUT_POST, $param, $filter);
    }
}
