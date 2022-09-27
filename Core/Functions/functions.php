<?php

//printa o dados do array ou mata o mesmo
function dd($parms = [], $die = true)
{
    echo '<pre>';
    print_r($parms);
    echo '</pre>';

    if ($die) {
        die();
    }
}

//Retorna uma posição da URI
function segment($segment)
{
    $request_uri = $_SERVER['REQUEST_URI'];

    $uri = array_values(array_filter(explode('/', $request_uri)));

    if ($uri[$segment] != FALSE) {
        return $uri[$segment];
    } else {
        return 0;
    }
}

//Retorna um array com as posições requisitadas
function segment_array($array = [], $remove = [], $separator = NULL)
{
    $request_uri = $_SERVER['REQUEST_URI'];

    $uri = array_values(array_filter(explode('/', $request_uri)));

    //Remove as posições selecionadas
    if (!empty($remove) and !empty($uri)) {
        foreach ($remove as $r) {
            unset($uri[$r]);
        }
    }

    //Retorna apenas as posições requisitadas
    if (!empty($array) and !empty($uri)) {
        foreach ($array as $a) {
            (!empty($uri[$a])) ? $array_return[] = $uri[$a] : '';
        }
    } else {
        $array_return = $uri;
    }

    //quebra o array e junta o mesmo
    //A não ser que seja apenas / que ai vai retorna para a index
    if (!empty($separator) and !empty($uri[1])) {
        $array_return = implode($separator, $array_return);
    }else{
        $array_return = '/';
    }

    return $array_return;
}
