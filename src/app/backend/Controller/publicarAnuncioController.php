<?php 
session_start();
require '../../../../../database/config.php';

$id = $_SESSION['id_user'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $querySQL = "INSERT INTO ANUNCIOS (id_user_fk, titulo_anuncio, descricao, preco)";

    
}
?>