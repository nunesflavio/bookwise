<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
        <form class="p-4 space-y-4" method="post">

            <?php

            if ($validacoes = flash()->get('validacoes_login')) {
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

                <label class="text-stone-400  mb-1">E-mail</label>
                <input type="email" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"

                       name="email"
                />
            </div>

            <div class="flex flex-col">

                <label class="text-stone-400  mb-1">Senha</label>
                <input type="password" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"
                       name="senha"
                />
            </div>

            <button type="submit" class="boder-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800 ">
                Logar
            </button>
        </form>

    </div>


    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
        <form class="p-4 space-y-4" method="post" action="/registrar">

            <?php
            if ($validacoes = flash()->get('validacoes_registrar')) {
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

                <label class="text-stone-400  mb-1">Nome</label>
                <input type="text" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"

                       name="nome"

                />
            </div>

            <div class="flex flex-col">

                <label class="text-stone-400  mb-1">E-mail</label>
                <input type="email" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"

                       name="email"
                />
            </div>

            <div class="flex flex-col">

                <label class="text-stone-400  mb-1">Confirme o E-mail</label>
                <input type="email" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"

                       name="email_confirmacao"

                />
            </div>

            <div class="flex flex-col">

                <label class="text-stone-400  mb-1">Senha</label>
                <input type="password" class="border-stone-800  bg-stone-900 text-sm border-2 rounded-md focus:outline-none px-2 py-1"

                       name="senha"

                />
            </div>

            <button type="reset" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800 ">
                Cancelar
            </button>

            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800 ">
                Registrar
            </button>

        </form>

    </div>

</div>
