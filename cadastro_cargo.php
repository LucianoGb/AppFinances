<?php

session_start();
require 'funcoes.php';

$cargo =$_POST['cargo'];

echo 'cargo :' . $cargo . '<br>';

$resp = cadastroCargo($cargo);



if($resp){
    echo "<script>alert('CADASTRADO')
    location.href = 'dashboard.php'
    </script>";
}else{
    echo "<script>alert('ERRO AO CADASTRAR, ENTRE EM CONTATO COM O ADMINISTRADOR')
    location.href = 'cargo.php'
    </script>";
}