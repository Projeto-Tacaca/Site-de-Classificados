<?php 
require '../../../../database/config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirmSenha = $_POST['confirmSenha'];

    // Verifica se o e-mail já está cadastrado
    $querySQL = "SELECT 1 FROM usuarios WHERE email = ?";

    $preparedStatment = $connection->prepare($querySQL);
    $preparedStatment->bind_param("s", $email);
    $preparedStatment->execute();
    $preparedStatment->store_result();

    if($preparedStatment->num_rows > 0){
        echo "<script>alert('E-mail já cadastrado.');</script>";
        echo "<script>window.location.href = '../../public/frontend/View/registro.php';</script>";
        $preparedStatment->close();
        exit();
    }
    $preparedStatment->close();

    // Verifica se a senha e a confirmação de senha são iguais
    if($senha != $confirmSenha){
        echo "<script>alert('As senhas não coincidem.');</script>";
        echo "<script>window.location.href = '../../public/frontend/View/registro.php';</script>";
        exit();

    }else{
        // Criptografa a senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        // Insere os dados do usuário no banco de dados
        $querySQL = "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
        $preparedStatment = $connection->prepare($querySQL);
        $preparedStatment->bind_param("ssss", $nome, $email, $senha, $telefone);    
        $preparedStatment->execute();
        $preparedStatment->close();

        // Redireciona para a tela de login
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        echo "<script>window.location.href = '../../public/frontend/View/login.php';</script>";
    }

}




?>