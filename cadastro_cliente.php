<?php

session_start();
require 'funcoes.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$nome_razao =$dados['nome_razao'];
$cpf_cnpj =$dados['cpf_cnpj'];
$tipo =$dados['tipo'];
$data_nascimento =$dados['data_nascimento'];
$data_abertura =$dados['data_abertura'];
$tipo_input =$dados['tipo_input'];
$email =$dados['email'];
$celular =$dados['celular'];
if( array_key_exists('id',$dados)){
    $id =$dados['id'];
}


// echo 'nome :' . $nome . '<br>';
// echo 'cpf :' . $cpf . '<br>';
// echo 'data_nascimento :' . $data_nascimento . '<br>';
// echo 'data_abertura :' . $data_abertura . '<br>';
// echo 'tipo :' . $tipo . '<br>';
// echo 'tipo :' . $tipo . '<br>';
// echo 'id :' . $id . '<br>';


if($tipo_input =='atualizar'){
    $resp = atualizaCliente($id,$nome_razao,$cpf_cnpj,$tipo,$data_nascimento,$data_abertura,$email,$celular); 
    // echo 'atualizar';

    // print_r($resp);

    // exit;
    if($resp == 1 ){
        // echo "<script>alert('ATUALIZADO')
        // location.href = 'clientes.php'
        // </script>";
        $retorna = ['erro'=> false, 'msg' =>  "clientes.php"];

    }else{
        $retorna =$resp;
        // echo "<script>alert('ERRO AO ATUALIZAR, ENTRE EM CONTATO COM O ADMINISTRADOR')
        // location.href = 'dashboard.php'
        // </script>";
    }
}else{
    $resp = cadastroCliente($nome_razao,$cpf_cnpj,$tipo,$data_nascimento,$data_abertura,$email,$celular);
    // echo 'cadastrar';
    // $retorna = ['erro'=> false, 'msg' => $resp];
    // echo json_encode($retorna);
    // exit;
    if(is_numeric($resp)? true : false){
        $retorna = ['erro'=> false, 'msg' =>  "clientes.php"];
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


