<?php

class Livro
{
    public $id;
    public $titulo;
    public $autor;
    public $descricao;
    public $ano_lancamento;
    public $usuario_id;

    public $nota_avliacao;

    public $count_avaliacoes;

    public $imagem;

    public function query($where, $params)
    {

        $dataBase = new Database(config('database'));

        return  $dataBase->query(
            "select l.id, l.titulo, l.autor, l.descricao, l.ano_lancamento, l.imagem,
                ifnull(round(sum(a.nota) / 5.0), 0) as nota_avaliacao
                , ifnull(count(a.id), 0) as count_avaliacoes
                from livros l 
                left join avaliacoes a on l.id = a.livro_id 
                  where $where
                group by l.id, l.titulo, l.autor, l.descricao, l.ano_lancamento, l.imagem
                ", self::class, $params
        );

    }

    public static function getLivroId($id)
    {

        return (new self)->query('l.id = :id', ['id' => $id])->fetch();

    }

    public static function allLivros($filtro = '')
    {

        return (new self)->query('titulo like :filtro', ['filtro' => "%$filtro%"])->fetchAll();

    }

    public static function allMyLivros($usuario_id)
    {

        return (new self)->query('l.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchAll();

    }

}