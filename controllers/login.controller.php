<?php

//require 'Validacao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';


    $valicacao = Validacao::validar([
        'email' => ['required', 'email'],
        'senha' => ['required']
    ], $_POST);

    if ($valicacao->naoPassou('login')) {
        header('location: /login');
        exit();
    }

    $usuario = $dataBase->query("SELECT * FROM usuarios WHERE email = :email",
        class: Usuario::class,
        params: [
            'email' => $email
        ]
    )->fetch();


    if ($usuario) {

        $senhaPost = $_POST["senha"] ;
        $senhaBanco = $usuario->senha;

        if (!password_verify($senha, $senhaBanco)) {
            flash()->push('validacoes_login', ['Usuario ou senha incorretos']);
            header('location: /login');
            exit();

        }


        $_SESSION['auth'] = $usuario;

        flash()->push('mensagem', 'Seja bem vindo '. $usuario->nome);

        header('location: /');
        exit();
    }
}


view('login');
