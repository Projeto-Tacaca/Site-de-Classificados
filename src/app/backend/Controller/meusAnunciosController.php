<?php 
session_start();
require __DIR__. '/../../../../database/config.php';

$id = $_SESSION['id_user'];

$querySQL = "SELECT * FROM anuncios WHERE id_user_fk = ?";

$preparedStatment = $connection->prepare($querySQL);
$preparedStatment->bind_param("i", $id);
$preparedStatment->execute();
$result =$preparedStatment->get_result();
if (!$result) {
    die("Erro na consulta: " . $connection->error);
}
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<img src="' . $row['caminho_img'] . '" alt="Anúncio">';
        echo '<h2>' . htmlspecialchars($row['titulo_anuncio']) . '</h2>';
        echo '<p>' . htmlspecialchars($row['descricao']) . '</p>';
        echo '<p>Preço: R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>';
        echo '<button class="btn-editar">Editar</button>';
        echo '<button class="btn-excluir">Excluir</button>';
        echo '</div>';
    }
} else {
    echo '<div id="mensagem-padrao">Nenhum anúncio encontrado. Publique seu primeiro anúncio!</div>';
}

?>