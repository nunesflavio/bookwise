<?php

function view($view, $data= [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    require "views/template/app.php";

}
function dd(...$dump)
{
    echo '<pre>';

    var_dump($dump);
    echo '</pre>';

    die();

}

function abort($code)
{
    http_response_code($code);
    view($code);

    die();

}

function flash()
{
    return new Flash();

}

function config($chave)
{
    $config = require "config.php";

    if (count($config[$chave]) > 0) {
        return $config[$chave];
    }

    return $config;

}

function auth()
{
    if (!isset($_SESSION['auth'])) {
        return null;
    }

    return $_SESSION['auth'];

}


