<?php
session_start();
header('Content-Type: application/json');

require 'funcoes.php';



// echo 'oi';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


// $retorna = $dados['email'] . 'senha'. $dados['senha'];



// echo json_encode('email - '.$_POST['email'].' - senha -'.$_POST['senha']);

if(!empty($dados['email']) && !empty($dados['senha'])){

    $email =$dados['email'];
    $senha =$dados['senha'];
  
    $resp = ValidarLogin($email,$senha);
    // print_r($resp);
    // $retorna = ['erro'=> true, 'msg' => $resp];
    // echo json_encode($retorna);
    // exit;

    if( array_key_exists('email',$resp)){
  
      
      $_SESSION['email'] = $resp['email'];
      $_SESSION['id'] = $resp['id'];
    
    
        // echo json_encode('LOGADO;');
        // header('Location: ../dashboard.php');
        $retorna = ['erro'=> false, 'msg' =>  "../dashboard.php"];
        // echo $_SESSION['email'];
      }else{
        // echo "<script>alert('Senha errada')
        // location.href = './pages/login.php'
        // </script>";
           $retorna =$resp;
   
        // $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' style='color:white !important' role='alert'><strong>Erro!</strong> Email ou senha!</div>"];
      
      }
    //   header('Location: index.php');
}else{
  $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' style='color:white !important' role='alert'><strong>Erro!</strong> Necessário preencher Email e senha!</div>"];
}

echo json_encode($retorna);