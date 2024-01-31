<?php

require 'CriadorDeConexao.php';


$pdo = new CriadorDeConexao();
$pdo->Conexao();

function ValidarLogin($email, $senha)
{
  $pass = md5($senha);



  try {

    $pdo = CriadorDeConexao::Conexao();
    $sql = $pdo->prepare("Select * from login where email = :email and senha = :senha");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $pass);
    $sql->execute();

    if ($sql && $sql->rowCount() != 0) {
      $array = $sql->fetch();
      return $array;
    } else {
      return  $array = ['erro' => true, 'msg' => "<div class='alert alert-danger' style='color:white !important' role='alert'><strong>Erro!</strong> Email ou senha errado!</div>"];
    }
  } catch (PDOException $Exception) {
    echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage();

    logMensage("Falha ao validar ao banco: {$Exception->getMessage()}", "info");
  }
}



function cadastroColaborador($nome, $cpf, $sexo, $data_nascimento, $data_admissao)
{

  if ($nome != '' && $cpf != '') {
    try {

      $pdo = CriadorDeConexao::Conexao();
      $sql = $pdo->prepare('INSERT INTO colaboradores (nome,cpf,sexo,data_nascimento,data_admissao) VALUES(:nome,:cpf,:sexo,:data_nascimento,:data_admissao)');

      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':cpf', $cpf);
      $sql->bindValue(':sexo', $sexo);
      $sql->bindValue(':data_nascimento', $data_nascimento);
      $sql->bindValue(':data_admissao', $data_admissao);



      $sql->execute();
      // $array = $pdo->lastInsertId();
      // return $array;
      if ($sql && $sql->rowCount() != 0) {
        $array = $pdo->lastInsertId();
        return $array;
      } else {
        return  $array = ['erro' => true, 'msg' => "<div class='alert alert-danger' style='color:white !important' role='alert'><strong>Erro!</strong> Por favor entre em contato com o administrador!</div>"];
      }
    } catch (PDOException $Exception) {
      echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage();

      logMensage("Falha ao validar ao banco: {$Exception->getMessage()}", "info");
    }
  } else {
    return  $array = ['erro' => true, 'msg' => "<div class='alert alert-warning ' style='color:white !important' role='alert'><strong>Atenção!</strong> Por favor preencha todos os campos!</div>"];
  }
}

function cadastroCliente($nome_razao, $cpf_cnpj, $tipo, $data_nascimento, $data_abertura, $email, $celular)
{
  if ($nome_razao != '' && $cpf_cnpj != '') {
    try {

      $pdo = CriadorDeConexao::Conexao();
      $sql = $pdo->prepare('INSERT INTO cliente (nome_razao,cpf_cnpj,tipo,data_nascimento,data_abertura,email,celular) VALUES(:nome_razao,:cpf_cnpj,:tipo,:data_nascimento,:data_abertura,:email,:celular)');

      $sql->bindValue(':nome_razao', $nome_razao);
      $sql->bindValue(':cpf_cnpj', $cpf_cnpj);
      $sql->bindValue(':tipo', $tipo);
      $sql->bindValue(':data_nascimento', $data_nascimento);
      $sql->bindValue(':data_abertura', $data_abertura);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':celular', $celular);



      $sql->execute();
      if ($sql && $sql->rowCount() != 0) {
        $array = $pdo->lastInsertId();
        return $array;
      } else {
        return  $array = ['erro' => true, 'msg' => "<div class='alert alert-danger' style='color:white !important' role='alert'><strong>Erro!</strong> Por favor entre em contato com o administrador!</div>"];
      }
    } catch (PDOException $Exception) {
      echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage();

      logMensage("Falha ao validar ao banco: {$Exception->getMessage()}", "info");
    }
  } else {
    return  $array = ['erro' => true, 'msg' => "<div class='alert alert-warning ' style='color:white !important' role='alert'><strong>Atenção!</strong> Por favor preencha todos os campos!</div>"];
  }
}
function atualizaColaborador($id, $nome, $cpf, $email,$sexo, $data_nascimento, $data_admissao)
{

  if ($nome != '' && $cpf != '') {
    try {
      $pdo = CriadorDeConexao::Conexao();
      $sql = $pdo->prepare('UPDATE colaboradores 
        SET nome = :nome,
            cpf = :cpf ,
            email_corporativo = :email ,
            sexo = :sexo,
            data_nascimento = :data_nascimento,
            data_admissao = :data_admissao 
            where id=' . $id);
    
    
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':cpf', $cpf);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':sexo', $sexo);
      $sql->bindValue(':data_nascimento', $data_nascimento);
      $sql->bindValue(':data_admissao', $data_admissao);
    
    
    
      $sql->execute();
      // $array = $pdo->lastInsertId();
      // return True;
      // $array = $pdo->lastInsertId();

      if ($sql && $sql->rowCount() != 0) {
        // $array = $pdo->lastInsertId();
        // return $array;
        return True;
      } else {
        return  $array = ['erro' => true, 'msg' => "<div class='alert alert-danger' style='color:white !important' role='alert'><strong>Erro!</strong> Por favor entre em contato com o administrador!</div>"];
      }
    } catch (PDOException $Exception) {
      echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage();

      logMensage("Falha ao validar ao banco: {$Exception->getMessage()}", "info");
    }
  } else {
    return  $array = ['erro' => true, 'msg' => "<div class='alert alert-warning ' style='color:white !important' role='alert'><strong>Atenção!</strong> Por favor preencha todos os campos!</div>"];
  }
 
}

function atualizaCliente($id, $nome_razao, $cpf_cnpj, $tipo, $data_nascimento, $data_abertura, $email, $celular)
{
  if ($nome_razao != '' && $cpf_cnpj != '') {
    try {
      $pdo = CriadorDeConexao::Conexao();
      $sql = $pdo->prepare('UPDATE cliente 
        SET nome_razao = :nome_razao,
            cpf_cnpj = :cpf_cnpj ,
            tipo = :tipo,
            data_nascimento = :data_nascimento,
            data_abertura = :data_abertura ,
            email = :email ,
            celular = :celular 
            where id=' . $id);


      $sql->bindValue(':nome_razao', $nome_razao);
      $sql->bindValue(':cpf_cnpj', $cpf_cnpj);
      $sql->bindValue(':tipo', $tipo);
      $sql->bindValue(':data_nascimento', $data_nascimento);
      $sql->bindValue(':data_abertura', $data_abertura);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':celular', $celular);



      $sql->execute();
      // $array = $pdo->lastInsertId();

      if ($sql && $sql->rowCount() != 0) {
        // $array = $pdo->lastInsertId();
        // return $array;
        return True;
      } else {
        return  $array = ['erro' => true, 'msg' => "<div class='alert alert-danger' style='color:white !important' role='alert'><strong>Erro!</strong> Por favor entre em contato com o administrador!</div>"];
      }
    } catch (PDOException $Exception) {
      echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage();

      logMensage("Falha ao validar ao banco: {$Exception->getMessage()}", "info");
    }
  } else {
    return  $array = ['erro' => true, 'msg' => "<div class='alert alert-warning ' style='color:white !important' role='alert'><strong>Atenção!</strong> Por favor preencha todos os campos!</div>"];
  }
}

function cadastroCargo($cargo)
{

  $pdo = CriadorDeConexao::Conexao();
  $sql = $pdo->prepare('INSERT INTO cargo (descricao) VALUES(:descricao)');

  $sql->bindValue(':descricao', $cargo);

  $sql->execute();
  $array = $pdo->lastInsertId();
  return $array;
}
function criarLogin($email,$cpf)
{

  $pdo = CriadorDeConexao::Conexao();
  $sql = $pdo->prepare('INSERT INTO login (email,senha,data_criacao) VALUES(:email,:senha,:data_criacao)');
  $agora = date( 'Y-m-d H:i:s');
  $sql->bindValue(':email', $email);
  $sql->bindValue(':senha', md5($cpf));
  $sql->bindValue(':data_criacao', $agora);
  $sql->execute();
  $array = $pdo->lastInsertId();
  return $array;
}

function listarLogin($email)
{
  $pdo = CriadorDeConexao::Conexao();
  $sql = $pdo->prepare("Select * from login where email = :email");
  $sql->bindValue(':email', $email);
  $sql->execute();
  $resp = "Não encontrado login na base de dados!";
  if ($sql && $sql->rowCount() != 0) {
    $array = $sql->fetch();
    return $array;
  }else{
    return $resp;
  }
}


function listarColaboradores()
{
  $pdo = CriadorDeConexao::Conexao();
 
  $sql = $pdo->prepare('SELECT id,nome,cpf,sexo,DATE_FORMAT(data_nascimento,
  "%d/%m/%Y"
  ) 
  AS 
  data_nascimento,  
  DATE_FORMAT(data_admissao,
  "%d/%m/%Y"
  ) 
  AS 
  data_admissao
  FROM colaboradores order by id');
  $sql->execute();
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);
  if ($sql->rowCount() > 0) {
    return $result;
  }
}

function listarClientes()
{
  $pdo = CriadorDeConexao::Conexao();
  $sql = $pdo->prepare('SELECT * from cliente ORDER BY id');
  $sql->execute();
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);
  if ($sql->rowCount() > 0) {
    return $result;
  }
}


function listarColaboradorPorId($id)
{
  $pdo = CriadorDeConexao::Conexao();
  $sql = $pdo->prepare('SELECT id,nome,cpf,email_corporativo,sexo,data_nascimento,data_admissao,status from colaboradores where id =' . $id);
  $sql->execute();
  $result = $sql->fetchAll();
  if ($sql->rowCount() > 0) {
    return $result;
  }
}
function listarClientePorId($id)
{
  $pdo = CriadorDeConexao::Conexao();
  $sql = $pdo->prepare('SELECT * from cliente where id =' . $id);
  $sql->execute();
  $result = $sql->fetchAll();
  if ($sql->rowCount() > 0) {
    return $result;
  }
}
