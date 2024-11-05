<?php

class dataBase
{

    private $db;

    public function __construct($config) {

        $this->db = new PDO($this->getDsn($config));

    }

    private function getDsn($config)
    {
        $driver = $config['driver'];


        unset($config['driver']);


        $dsn = $driver. ':' . http_build_query($config, '', ';');


        if ($driver == 'sqlite') {
            $dsn = $driver. ':' . $config['database'];
        }

        return $dsn;

    }

    public function query($sql, $class = null, $params = []): false|PDOStatement
    {

        $prepare = $this->db->prepare($sql);


        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);

        return $prepare;

        // return array_map(fn($item) => Livro::make($item), $itens);
    }

}

$dataBase = new dataBase(config('database'));