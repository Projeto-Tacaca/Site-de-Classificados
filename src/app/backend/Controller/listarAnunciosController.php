<?php
define('BASE_URL', '/Site-de-Classificados/');
echo "<link rel='stylesheet' href='" . BASE_URL . "css/estilizacao aba inicial.css'>";

require '../../../../../database/config.php';

$querySQL = "SELECT * FROM anuncios";
$preparedStatment = $connection->prepare($querySQL);
if (!$preparedStatment) {
    die("Erro ao preparar: " . $connection->error);
}
$preparedStatment->execute();
$result = $preparedStatment->get_result();

if ($result->num_rows > 0){
    while($rows = $result->fetch_assoc()){
        $id_anuncio = $rows['id_anuncios'];
        $id_usuario = $rows['id_user_fk'];
        $id_categoria = $rows['id_categoria_fk'];
        $titulo = $rows['titulo_anuncio'];
        $descricao = $rows['descricao'];
        $preco = $rows['preco'];
        $caminho_img = $rows['caminho_img'];
        $data = $rows['data_criacao'];
        $data = date('d/m/Y', strtotime($data));

      echo "<div class='card'>
        <img src='" . BASE_URL . "/uploads/teste.png'>
        <h2>$titulo</h2>
        <p>Preço: R$ $preco</p>
        <p id = 'preco'> $data</p>
        <a href='../../../public/frontend/view/anuncio.php?id_anuncios=$id_anuncio'>Ver Detalhes</a>
      </div>";


        

    }

}




?>