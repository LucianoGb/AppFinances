<?php
session_start();
require 'funcoes.php';


$cpf = $_POST['cpf'];
$email = $_POST['email'];



$resposta = listarLogin($email);


if(isset($resposta['id'])){
    echo "<script>alert('Já existe login cadastrado');
    location.href = 'colaboradores.php'
    </script>";
}else{
    $result = criarLogin($email,$cpf);
    if($result){
        echo "<script>alert('Login cadastrado');
        location.href = 'colaboradores.php'
        </script>";
    }
}