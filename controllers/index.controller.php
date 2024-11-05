<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$pesquisar = $_REQUEST["pesquisar"] ?? '';


$livros = Livro::allLivros($pesquisar);


view('index', [
    'livros' => $livros
]);
