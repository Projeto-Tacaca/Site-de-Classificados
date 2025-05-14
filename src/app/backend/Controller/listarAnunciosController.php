<?php
require 'c:\xampp\htdocs\Site-de-Classificados\database\config.php';

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
        $data = $rows['data_criacao'];

    

        

    }

}



?>