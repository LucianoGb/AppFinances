<?php

require 'CriadorDeConexao.php';
// require 'funcoes.php';

// $agora = date( 'd/m/Y');

// $agora = str_replace('/','-',$agora );

// $colaboradores = listarColaboradores();

// var_dump($colaboradores);

echo 'short CODE' . '<br>';
$nome = '';
function formatandoData($data){

  $data = str_replace('/','-',$data );

  $novaData = $data[6].$data[7].$data[8].$data[9].'-'.$data[3].$data[4].'-'.$data[0].$data[1];
  return $novaData;
}


 
 function CriarUsuario($email,$senha){
    $pdo = CriadorDeConexao::Conexao();
   
    $sql = $pdo->prepare('INSERT INTO login (email,senha,data_criacao) VALUES(:email,:senha,:data_criacao)');
    $agora = date( 'Y-m-d H:i:s');
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', md5($senha));
    $sql->bindValue(':data_criacao', $agora);
    $sql->execute();
    $array = $pdo->lastInsertId();
  print_r( $array);
  }
 function delete(){
    $pdo = CriadorDeConexao::Conexao();
   
    $sql = $pdo->prepare('DROP table cliente');
 
    $sql->execute();
   
  print_r( $sql);
  }
 function select(){
    $pdo = CriadorDeConexao::Conexao();
   
    $sql = $pdo->prepare('select * from login');
 
    $sql->execute();
   
  print_r( $sql);
  }

  // CriarUsuario("dev","admindev@2023");
  delete();

  ?>

  <?= ($nome) ?: 'SEM NOME'; ?>