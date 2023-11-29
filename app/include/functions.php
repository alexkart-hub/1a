<?php

function dump($data, $vardump = false)
{
    if ($vardump) {
        var_dump($data);
        return;
    }
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}