<?php

class Validacao
{
    public $validacoes = [];
    public static function validar($regras, $dados) {

        $validacao = new self;

        foreach ($regras as $campo => $regrasCampo) {

            foreach ($regrasCampo as $regra) {

                $valorCampo = $dados[$campo];

                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorCampo, $dados["{$campo}_confirmacao"]);

                } elseif (str_contains($regra, ':')) {

                    $temp = explode(':', $regra);
                    $regra = $temp[0];
                    $regraAr = $temp[1];
                    $validacao->$regra($regraAr, $campo, $valorCampo);

                } else {
                    $validacao->$regra($campo, $valorCampo);
                }


            }
        }


        return $validacao;
    }

    private function required($campo, $valor)
    {
        if (strlen($valor) == 0) {
            $this->validacoes []= "O $campo é obrigatorio";
        }

    }

    private function email($campo, $valor)
    {
        if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes []= "O $campo é invalido";
        }

    }

    private function confirmed($campo, $valor, $valorConfirmacao)
    {
        if ($valor !== $valorConfirmacao) {
            $this->validacoes []= "O $campo esta diferente";
        }

    }

    private function min($min, $campo, $valor)
    {
        if (strlen($valor) < $min) {
            $this->validacoes []= "O $campo precisa ter minimo $min caracteres";

        }

    }

    private function max($max, $campo, $valor)
    {
        if (strlen($valor) > $max) {
            $this->validacoes []= "O $campo precisa ter maximo $max caracteres";

        }

    }

    private function strong($campo, $valor)
    {
        if (!strpbrk($valor, '!@#()&$*') ) {
            $this->validacoes []= "O $campo percisa ter um dos !@#()&$*";
        }

    }

    private function unique($table, $campo, $valor)
    {
        if (strlen($campo) == 0) {
            return;
        }

        $db = new Database(config('database'));
        $result = $db->query(
            "SELECT * FROM $table WHERE $campo = :valor", params: ['valor' => $valor])->fetch();

        if ($result) {
            $this->validacoes []= "O $campo já está sendo usado";

        }

    }

    public function naoPassou($nomeForm = null)
    {
        $chave = 'validacoes';

        if ($nomeForm) {
            $chave .= '_'.$nomeForm;
        }

        flash()->push($chave, $this->validacoes);

        return sizeof($this->validacoes) > 0;

    }

}