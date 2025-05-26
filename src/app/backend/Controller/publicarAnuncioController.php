<?php 
session_start();
require __DIR__ . '/../../../../database/config.php';

$id = $_SESSION['id_user'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? '';

    // Pasta onde as imagens ficarão
    $uploadDir = __DIR__ . '/../../../../uploads/';
    $uploadUrl = '/Site-de-Classificados/uploads/';

    // Verifica se a imagem foi enviada sem erro
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid('img_') . '.' . $ext;
        $caminhoCompleto = $uploadDir . $nomeArquivo;

        // Move o arquivo para a pasta de uploads
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoCompleto)) {
            // Caminho que será salvo no banco
            $caminhoNoBanco = $uploadUrl . $nomeArquivo;

            // Insere no banco
            $querySQL = "INSERT INTO ANUNCIOS (id_user_fk, caminho_img, titulo_anuncio, descricao, preco) 
                         VALUES (?, ?, ?, ?, ?)";

            $stmt = $connection->prepare($querySQL);
            $stmt->bind_param("issss", $id, $caminhoNoBanco, $titulo, $descricao, $preco);

            if ($stmt->execute()) {
                echo "<script>alert('Anúncio publicado com sucesso!');</script>";
            echo "<script>window.location.href = '../../public/frontend/View/telaDeAnuncios.php';</script>";
            } else {
                echo "Erro ao salvar no banco: " . $stmt->error;
            }

        } else {
            echo "Erro ao mover o arquivo.";
        }

    } else {
        echo "Erro no upload da imagem.";
    }
}
?>
