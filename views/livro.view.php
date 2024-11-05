<?php

    echo $livro->titulo;

    require 'partials/_livro.php';

?>

<h2>Avaliações</h2>
<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 gap-4 grid">
        <?php
            foreach($avaliacoes as $avaliacao){
                echo "<div class='border border-stone-700 rounded p-2'>";
                echo $avaliacao->avaliacao;
                $nota = str_repeat("⭐", $avaliacao->nota);
                echo $nota;

                echo "</div>";
            }
        ?>

    </div>

    <div>

        <?php
            if(auth()) {
        ?>

        <div class="border border-stone-700 rounded">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Avaliação</h1>
            <form class="p-4 space-y-4" method="post" action="avaliacao-criar">

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
                    <input type="hidden" name="livro_id" value="<?php echo $livro->id ?>" >
                    <label class="text-stone-400  mb-1">Avaliação</label>
                    <textarea type="text" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"
                              name="avaliacao">

                    </textarea>
                </div>

                <div class="flex flex-col">

                    <label class="text-stone-400  mb-1">Nota</label>
                    <select class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1" name="nota">
                        <option value="1" > 1 </option>
                        <option value="2" > 2 </option>
                        <option value="3" > 3 </option>
                        <option value="4" > 4 </option>
                        <option value="5" > 5 </option>

                    </select>
                </div>

                <button type="submit" class="boder-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800 ">
                    Salvar
                </button>
            </form>

        </div>

        <?php
            }
        ?>


    </div>
</div>

