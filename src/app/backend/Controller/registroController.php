<?php 
require '../../../../database/config.php';




if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirmSenha = $_POST['confirmSenha'];

    $querySQL = "SELECT 1 FROM usuarios WHERE email = '$email'";
    

    if($senha != $confirmSenha){
        echo "<script>alert('As senhas não coincidem.');</script>";
        echo "<script>window.location.href = '../../public/frontend/View/registro.php';</script>";
        exit();

    }

    
}




?>