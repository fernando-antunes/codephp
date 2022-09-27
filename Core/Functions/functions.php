<?php

function dd($parms = [], $die = true)
{
    echo '<pre>';
    print_r($parms);
    echo '</pre>';

    if ($die) {
        die();
    }
}
