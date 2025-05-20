<?php 
require '../../../../../database/config.php';

$id_user = $_SESSION['id_user'];

$querySQL = "SELECT * FROM usuarios WHERE id_user = ?";
$preparedStatment = $connection->prepare($querySQL);
if (!$preparedStatment) {
    die("Erro ao preparar: " . $connection->error);
}
$preparedStatment->bind_param("i", $id_user);
$preparedStatment->execute();
$result = $preparedStatment->get_result();
if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    // Exibe os dados diretamente (ou envie para o frontend)
    echo "<script>
        document.getElementById('inputNome').innerText = '{$usuario['nome']}';
        document.getElementById('inputEmail').innerText = '{$usuario['email']}';
        document.getElementById('inputTelefone').innerText = '{$usuario['telefone']}';
        document.getElementById('nomeCentralizado').innerText = '{$usuario['nome']}';
    </script>";
} else {
    echo "<script>alert('Usuário não encontrado.');</script>";
}
$preparedStatment->close();
$connection->close();



?>