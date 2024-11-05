<h1 class="mt-6 font-bold text-lg">Meus Livros</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 flex flex-col gap-4 ">
        <?php
         foreach ($livros as $livro) {
             require 'partials/_livro.php';

         }
        ?>

    </div>

    <div>

        <div class="border border-stone-700 rounded">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre un novo livro</h1>
            <form class="p-4 space-y-4" method="post" action="livro-criar" enctype="multipart/form-data">

                <?php

                if ($validacoes = flash()->get('validacoes')) {
                    echo '<div class="border-red-800  bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold">';
                    echo '<ul>';
                    foreach ($validacoes as $validacao) {
                        echo '<li>'.$validacao.'</li>';
                    }

                    echo '</ul>';
                    echo '</div>';
                }
                ?>


                <div class="flex flex-col">
                    <label class="text-stone-400  mb-1">Titulo</label>
                    <input type="text" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"
                              name="titulo"
                    />

                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400  mb-1">Imagem</label>
                    <input type="file" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"
                           name="imagem"
                    />

                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400  mb-1">Autor</label>
                    <input type="text" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"
                              name="autor"
                    >

                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400  mb-1">Descricao</label>
                    <textarea type="text" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"
                           name="descricao">

                    </textarea>
                </div>

                <div class="flex flex-col">

                    <label class="text-stone-400  mb-1">Ano lancmento</label>
                    <select class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1" name="ano_lancamento">

                        <?php
                            foreach (range(1900, date('Y')) as $ano) {
                                echo '<option value="'.$ano.'">'.$ano.'</option>';
                            }
                        ?>

                    </select>
                </div>

                <button type="submit" class="boder-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800 ">
                    Salvar
                </button>
            </form>

        </div>

    </div>
</div>