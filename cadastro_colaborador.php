<?php

session_start();
require 'funcoes.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$nome =$dados['nome'];
$cpf =$dados['cpf'];
$sexo =$dados['sexo'];
$data_nascimento =$dados['data_nascimento'];
$data_admissao =$dados['data_admissao'];
$tipo =$dados['tipo'];
$email =$dados['email'];
if( array_key_exists('id',$dados)){
    $id =$dados['id'];
}


// echo 'nome :' . $nome . '<br>';
// echo 'cpf :' . $cpf . '<br>';
// echo 'data_nascimento :' . $data_nascimento . '<br>';
// echo 'data_admissao :' . $data_admissao . '<br>';
// echo 'sexo :' . $sexo . '<br>';
// echo 'tipo :' . $tipo . '<br>';
// echo 'id :' . $id . '<br>';


if($tipo =='atualizar'){
    $resp = atualizaColaborador($id,$nome,$cpf,$email,$sexo,$data_nascimento,$data_admissao); 
    // echo 'atualizar';

    // print_r($resp);

    // exit;
    if($resp == 1 ){
        $retorna = ['erro'=> false, 'msg' =>  "colaboradores.php"];
        // echo "<script>alert('ATUALIZADO')
        // location.href = 'colaboradores.php'
        // </script>";
    }else{
        $retorna =$resp;
        // echo "<script>alert('ERRO AO ATUALIZAR, ENTRE EM CONTATO COM O ADMINISTRADOR')
        // location.href = 'dashboard.php'
        // </script>";
    }
}else{
    $resp = cadastroColaborador($nome,$cpf,$sexo,$data_nascimento,$data_admissao);
    // echo 'cadastrar';
    if(is_numeric($resp)? true : false){
        $retorna = ['erro'=> false, 'msg' =>  "colaboradores.php"];
        // $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-success' style='color:white !important' role='alert'><strong>Feito!</strong>Cadastro realizado!</div>"];

        // echo "<script>alert('CADASTRADO')
        // location.href = 'clientes.php'
        // </script>";
    }else{
        $retorna =$resp;
        // echo json_encode($retorna);
        // echo "<script>alert('ERRO AO CADASTRAR, ENTRE EM CONTATO COM O ADMINISTRADOR')
        // location.href = 'dashboard.php'
        // </script>";
    }
}

echo json_encode($retorna);


