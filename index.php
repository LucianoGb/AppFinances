<?php

use AppFinances\config\db\CriadorDeConexao;

require __DIR__.'/vendor/autoload.php';
include __DIR__.'/app/config/constants.php';

echo "index";

$conexao = new CriadorDeConexao();

$conexao::Conexao();



die();
header('Location:./app/template/pages/examples/login.html');