<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require '../models/Livro.php';

require '../models/Usuario.php';
require '../models/Avaliacao.php';

session_start();

require '../Flash.php';
require '../functions.php';

require '../dataBase.php';

require '../Validacao.php';

require '../routes.php';
