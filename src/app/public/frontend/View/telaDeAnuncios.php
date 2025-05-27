<?php 
session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['id_user'])) {
header("Location: /Site-de-Classificados/src/app/public/frontend/View/login.php");
    exit();

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Anúncios</title>
    <link rel="stylesheet" href="../css/estilizacao aba inicial.css">
</head>
<body>
    
 <div class="text">
    <H1>VER-O-ANÚNCIO</H1>
   
    <p>imóveis, restaurantes e objetos</p>
</div>


<div>
<form class="search-bar" action="javascript" method="GET">
    <input type="search" id="pesquisar" placeholder="Oque você busca?">
    <label for="pesquisar"><span class="icon"></span><ion-icon name="search-outline"></ion-icon></span></label>
</form>
</div>

        <div class="card-layout">
                   <?php  include '../../../backEnd/Controller/listarAnunciosController.php';?>

                </div>

        <!-- barra lateral -->
        <div class="navigation">
            <ul>
                <li class="list active">
                    <a href="#">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">início</span>
                    </a>
                <li class="list">
                    <a href="publicaranuncio.php">
                        <span class="icon"><ion-icon name="albums-outline"></ion-icon></span>
                        <span class="title">publicar anúncios</span>   
                    </a>
                </li>
                </li>
                <li class="list">
                    <a href="telaMeusAnuncios.php">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="title">meus anuncios</span>   
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="star-half-outline"></ion-icon></span>
                        <span class="title">favoritos</span>   
                    </a>
                </li>
                
                <li class="list">
                    <a href="teladeperfil.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">minha conta</span>   
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">ajuda</span>   
                    </a>
                </li>
                <li class="list">
                    <a href="../../../backEnd/Controller/logoutController.php">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">sair</span>   
                    </a>
                </li>
                
            </ul>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

            <script>
                const list = document.querySelectorAll('.list');
                function activeLink() {
                    list.forEach((item) => item.classList.remove('active'));
                    this.classList.add('active');
                }
                list.forEach((item) =>
                 item.addEventListener('click', activeLink));
            </script>  
        </div>


          
</body>
</html>