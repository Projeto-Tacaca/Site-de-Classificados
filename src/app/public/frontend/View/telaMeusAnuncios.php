<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meus Anúncios</title>
  <link rel="stylesheet" href="../css/meusAnuncios.css" />
</head>
<body>
  <header class="header">
    <a href="../view/telaDeAnuncios.php" class="back">&#8592;</a>
    <h1 class="titulo">MEUS ANÚNCIOS</h1>
  </header>
  <main class="container" style="max-width: 700px; margin-top: 32px;">
    
    <div id="anuncios-lista">
      <?php 
      include __DIR__ . '/../../../backEnd/Controller/meusAnunciosController.php';
      ?>  
    </div>
    <button class="add">
     <a href="publicaranuncio.php">
    +
    </a>
</button>
  </main>
</body>
</html>