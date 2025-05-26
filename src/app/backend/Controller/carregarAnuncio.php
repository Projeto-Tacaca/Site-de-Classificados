<?php 
session_start();
define('BASE_URL', '/Site-de-Classificados/');

require '../../../../../database/config.php';
$id = $_SESSION['id_user'];
$id_anuncio = $_GET['id_anuncios'];
$querySQL = "SELECT * FROM anuncios WHERE id_anuncios = ?";
$preparedStatment = $connection->prepare($querySQL);
if (!$preparedStatment) {
    die("Erro ao preparar: " . $connection->error);
}
$preparedStatment->bind_param("i", $id_anuncio);
$preparedStatment->execute();
$result = $preparedStatment->get_result();
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $id_anuncio = $rows['id_anuncios'];
        $id_usuario = $rows['id_user_fk'];
        $image = $rows['caminho_img'];
        $titulo = $rows['titulo_anuncio'];
        $descricao = $rows['descricao'];
        $preco = $rows['preco'];
        $dataFormatada = date('d/m/Y', strtotime($rows['data_criacao']));        

        //BUSCAR NOME USER
        //REFATORAR PARA FUNÇÃO
        $nome_usuario = buscarNomeUser($connection,$id_usuario);

        echo "<div class='image-box'>
        <img src='$image' alt='Imagem do Anúncio'>       
        <span class='star'>&#9733;</span>
      </div>
";
        echo "  
         <h2>$titulo</h2>
        <h3>Preço: R$ $preco</h3>
        <p id = 'preco'> $descricao</p>
        <p class='seller'><strong>Vendedor:</strong> $nome_usuario</p>
        <p class = 'data'>$dataFormatada</p>

        ";
        
    }
} else {
    echo "Nenhum anúncio encontrado.";
}


//Função para buscar o nome do usuário
function buscarNomeUser($connection,$id_usuario){
    $querySQL2 = "SELECT nome FROM usuarios WHERE id_user = ?";
    $preparedStatment2 = $connection->prepare($querySQL2);

    if (!$preparedStatment2) {
        die("Erro ao preparar: " . $connection->error);
    }
    $preparedStatment2 ->bind_param("i", $id_usuario);
    $preparedStatment2->execute();
    $result2 = $preparedStatment2->get_result();
    if($result2->num_rows > 0){
        $rows2 = $result2->fetch_assoc();
        $nome_usuario = $rows2['nome'];
        return $nome_usuario;

    }else{
        $nome_usuario = "Usuário desconhecido";

    }

}
?>