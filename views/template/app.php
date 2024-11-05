<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>


    <title>Lista de livros</title>
</head>
<body class="bg-stone-950 text-stone-200">

<header class=" bg-stone-800 ">

    <nav class="mx-auto max-w-screen-lg  flex justify-between px-4">
        <div class="font-bold text-xl tracking-wide ">Book Wise</div>

        <ul class="flex space-x-4 font-bold">
            <li><a href="/" class="text-lime-400">Explorar</a> </li>
            <?php
            if (auth()) {
                echo "<li><a href='/meus-livros' class='hover:underline'>Meus Livros</a> </li>";

            }

            ?>

        </ul>

        <ul>
            <?php
                if (auth()) {
                    echo "<li><a href='/logout' class='hover:underline'>Ola, ".auth()->nome."</a> </li>";

                } else {
                    echo "<li><a href='/login' class='hover:underline'>Login</a> </li>";

                }

            ?>

        </ul>

    </nav>

</header>

<main class="mx-auto max-w-screen-lg space-y-6">

    <?php
    if ($mensagem = flash()->get('mensagem')) {
        echo '<div class="border-green-800  bg-green-900 text-green-400 px-4 py-1 rounded-md border-2 text-sm font-bold">';
        echo $mensagem;
        echo '</div>';

    }
    ?>

    <?php require "../views/{$view}.view.php" ?>

</main>

</body>
</html>
