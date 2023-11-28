<?php

namespace AppFinances\config\db;
use PDO;

require 'logMensage.php';
//require '../constants.php';


class CriadorDeConexao
{
    public static function Conexao()
    {


        $db_ip = DATABASE['app_ip'];
        $db_pw = DATABASE['app_pw'];
        $db_user = DATABASE['app_user'];
        $db_name = DATABASE['app_db'];



        try {
            $PDO = new PDO( "mysql:dbname=$db_name;host=$db_ip",
                $db_user,
                $db_pw);

            logMensage('Conectado ao banco com sucesso', 'info');
            //echo 'conectado';
            return $PDO;

        } catch (PDOException $Exception ) {
            echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage( );

            logMensage("Falha ao conectar ao banco: {$Exception->getMessage( )}","error");
        }

    }

}

