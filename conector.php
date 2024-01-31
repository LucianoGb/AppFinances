<?php
function salvarBanco($cnpj_cpf, $aceita_cookie_cadastro, $aceita_cookie_mkt)
{
  $PDO = '';
  $hostname_config = "162.214.111.240"; //162.214.111.240 / amcom826_db / dpP34#!!@GHz
  $database_config = "amcom826_coockies";

  $cookiecadastro = $aceita_cookie_cadastro == 1 ? 'Sim' : 'Nao';
  $mkt = $aceita_cookie_mkt == 1 ? 'Sim' : 'Nao';
  $data = date('d/m/Y');
  // echo $cnpj_cpf;
  // echo '  cadastro: ' . $cookiecadastro . "-  ";
  // echo 'mkt: ' . $mkt . "-  ";
  // echo   $data ;


  $PDO = new PDO(
    "mysql:dbname=$database_config;host=$hostname_config",
    'amcom826_db',
    'dpP34#!!@GHz'
  );

  $sql = $PDO->prepare("INSERT INTO cookie (cnpj_cpf,aceita_cookie_cadastro,data,aceita_marketing) VALUES(:cnpj_cpf,:aceita_cookie_cadastro,:datacadastro,:aceita_cookie_mkt)");
  $sql->bindValue(':cnpj_cpf', $cnpj_cpf, PDO::PARAM_STR);
  $sql->bindValue(':aceita_cookie_cadastro', $cookiecadastro, PDO::PARAM_STR);
  $sql->bindValue(':datacadastro', $data, PDO::PARAM_STR);
  $sql->bindValue(':aceita_cookie_mkt', $mkt, PDO::PARAM_STR);
  $sql->execute();
  $sql->rowCount();
 
}

