<?php


require 'logMensage.php';




class CriadorDeConexao
{
    public static function Conexao()
    {
       
        // $hostname_config = HOSTBD; 
        // $database_config = BD;
       

        try {
            $PDO = new PDO( "mysql:dbname=u860510651_ts;host=149.100.155.204",
           'u860510651_tsadmin',
           'tsAdmin@2023');

            logMensage('Conectado ao banco com sucesso', 'info');
            // echo 'conectado';
            return $PDO;

        } catch (PDOException $Exception ) {
            echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage( );

            logMensage("Falha ao conectar ao banco: {$Exception->getMessage( )}","error");
        }

    }

}

