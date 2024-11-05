<?php

//require 'Validacao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $evalidacoes = Validacao::validar([
        'nome' => ['required'],
        'email' => ['required', 'email', 'confirmed', 'unique:usuarios'],
         'senha' => ['required', 'min:8', 'max:30', 'strong']
    ], $_POST);

    if ($evalidacoes->naoPassou('registrar')) {

        header('location: /login');
        exit();
    }

     $usuario = $dataBase->query("select max(id) as usermax from usuarios;",
     )->fetch();

    $maxIdUser = $usuario['usermax'] + 1;


    $dataBase->query(
        "insert into usuarios (id,nome,email, senha) values (:id, :nome, :email, :senha)",
        params: [
            ':id' => $maxIdUser,
            ':nome' => $_POST['nome'],
            ':email' => $_POST['email'],
            ':senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
        ]
    );

    flash()->push('mesnagem', 'Registrado com sucesso"');

    header('location: /login');
    exit();
}

