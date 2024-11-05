<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /');
    exit();
}

$usuario_id = auth()->id;
$livro_id =  $_POST['livro_id'];
$avaliacao = filter_input(INPUT_POST, 'avaliacao');
$nota = filter_input(INPUT_POST, 'nota', FILTER_VALIDATE_INT);

$valicacao = Validacao::validar([
    'avaliacao' => ['required'],
    'nota' => ['required']
], $_POST);

if ($valicacao->naoPassou()) {
    header('location: livro?id=' . $livro_id);
    exit();
}


$dataBase->query(
    "insert into avaliacoes(usuario_id, livro_id, avaliacao, nota ) values (:usuario_id, :livro_id, :avaliacao, :nota);",
    params: compact('usuario_id', 'livro_id', 'avaliacao', 'nota')
);

flash()->push('mensagem', 'Avaliação criada com sucesso.');
header('location: livro?id=' . $livro_id);