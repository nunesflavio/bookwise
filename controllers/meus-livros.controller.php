<?php

if(!auth()) {
    header('location: /');
}

$livros = Livro::allMyLivros(auth()->id);

view('meus-livros', compact('livros'));