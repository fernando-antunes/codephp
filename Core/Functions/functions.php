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


    if (!empty($uri[$segment]) and $uri[$segment] != FALSE) {
        return $uri[$segment];
    } else {
        return;
    }
}

//Retorna um array com as posições requisitadas
function segment_array($array = [], $remove = [], $separator = NULL)
{
    $request_uri = $_SERVER['REQUEST_URI'];

    $uri = array_values(array_filter(explode('/', $request_uri)));

    $array_return = '';

    //Remove as posições selecionadas
    if (!empty($remove) and !empty($uri)) {
        foreach ($remove as $r) {
            unset($uri[$r]);
        }
    }

    // dd($array);

    //Retorna apenas as posições requisitadas
    if (!empty($array) and !empty($uri)) {
        foreach ($array as $a) {
            (!empty($uri[$a])) ? $array_return[] = $uri[$a] : '';
        }
    } else {
        $array_return = $uri;
    }

    //quebra o array e junta o mesmo
    if (!empty($separator) and !empty($uri[1])) {
        $array_return = implode($separator, $array_return);
    }

    if (empty($array_return)) {
        $array_return = '/';
    }

    return $array_return;
}
