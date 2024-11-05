
<form class="w-full space-x-2 mt-6">
    <input type="text" class="border-stone-800 text-stone-900 bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"
           placeholder="pesquisar..."
           name="pesquisar"

    />
    <button type="submit">Pesquisar</button>
</form>


<section class="grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid gap-4">


    <?php
    foreach ($livros as $livro) {
        require 'partials/_livro.php';

    }
    ?>



</section>
