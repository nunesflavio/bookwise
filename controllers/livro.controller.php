<?php


$livro= Livro::getLivroId($_GET['id']);


$avaliacoes = $dataBase->query(
    "SELECT * FROM avaliacoes WHERE livro_id = :id", Avaliacao::class,[':id' => $_GET['id']],
)->fetchAll();


//$filtrado = array_filter($livros, fn($l) => $l['id'] == $id);

//$livro = array_pop($filtrado);


view('livro',[
'livro' => $livro,
    'avaliacoes' => $avaliacoes
]);
