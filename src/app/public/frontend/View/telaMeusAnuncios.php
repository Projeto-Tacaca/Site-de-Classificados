<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meus Anúncios</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <header class="header">
    <a href="../view/telaDeAnuncios.php" class="back">&#8592;</a>
    <h1 class="titulo">Meus anúncios</h1>
  </header>
  <main class="container" style="max-width: 700px; margin-top: 32px;">
    <div id="mensagem-padrao" style="color: #2e5c3e; font-size: 1.2rem; text-align: center; margin-bottom: 24px;">
      Nenhum anúncio encontrado. Publique seu primeiro anúncio!
    </div>
    <div id="anuncios-lista">
<?php 
include __DIR__ . '/../../../backEnd/Controller/meusAnunciosController.php';

?>  </div>
  </main>
</body>
</html>