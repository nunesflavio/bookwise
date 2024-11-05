<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /meus-livros');
    exit();
}

if(!auth()) {
    abort(403);
}

$usuario_id = auth()->id;
$titulo = filter_input(INPUT_POST, 'titulo');
$autor = filter_input(INPUT_POST, 'autor');
$descricao = filter_input(INPUT_POST, 'descricao');
$ano_lancamento = filter_input(INPUT_POST, 'ano_lancamento');

$nro_paginas = 0;



$valicacao = Validacao::validar([
    'titulo' => ['required', 'min:3'],
    'autor' => ['required'],
], $_POST);

if ($valicacao->naoPassou()) {
    header('location: /meus-livros');
    exit();
}


$dir = "images/";
$file = $dir.basename($_FILES['imagem']['name']);
$novoNome = md5(rand());
$extensao = pathinfo($file, PATHINFO_EXTENSION);
$imagem = "$dir$novoNome.'.'.$extensao";

move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__.'/../public/'.$imagem);

$dataBase->query(
    "insert into livros(titulo, autor, descricao, ano_lancamento, usuario_id, imagem ) values 
                                              (:titulo, :autor, :descricao, :ano_lancamento,:usuario_id, :imagem)",
    params: compact('titulo', 'autor', 'descricao', 'ano_lancamento', 'usuario_id', 'imagem')
);

flash()->push('mensagem', 'Livro criado com sucesso.');
header('location: /meus-livros');
exit();
