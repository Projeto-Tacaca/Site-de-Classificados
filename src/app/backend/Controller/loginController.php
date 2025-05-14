<?php 
session_start();
require '../../../../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $querySQL = "SELECT * FROM usuarios WHERE email = ?";
    $preparedStatment = $connection->prepare($querySQL);

      if (!$preparedStatment) {
        die("Erro ao preparar: " . $connection->error);
    }

    $preparedStatment->bind_param("s", $email);
    $preparedStatment->execute();
    $result = $preparedStatment->get_result();

    if($result->num_rows > 0){
        $usuario = $result->fetch_assoc();
        if(password_verify($senha, $usuario['senha'])){

            //Variáveis de sessão
            $_SESSION['id_user'] = $usuario['id_user'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['telefone'] = $usuario['telefone'];

            // Redireciona para a página inicial
            echo "<script>alert('Login realizado com sucesso!');</script>";
            echo "<script>window.location.href = '../../public/frontend/View/telaDeAnuncios.php';</script>";
            exit();

        }
        else{
            echo "<script>alert('Senha incorreta.');</script>";
            echo "<script>window.location.href = '../../public/frontend/View/login.php';</script>";
            exit();
        } 
    }
    else{
        echo "<script>alert('E-mail não cadastrado.');</script>";
        echo "<script>window.location.href = '../../public/frontend/View/login.php';</script>";
        exit();
    }


}


?>