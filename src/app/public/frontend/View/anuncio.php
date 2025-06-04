
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anúncio</title>
  <link rel="stylesheet" href="../css/anuncio.css">
</head>
<body>

  <header>
      <span class = "header-text"> VER-O-ANÚNCIO </span>
    <a href="../view/telaDeAnuncios.php" class="arrow">&#8592;</a>
  </header>

  <div class="ajuste">
    <div class="card">
      
      <div class="content">
        <?php  include '../../../backEnd/Controller/carregarAnuncio.php';
?>
        <button class="btn" >Falar com vendedor</button>
      </div>
    </div>
 </div>
 <button class="add">
     <a href="publicaranuncio.php">
    +
    </a>
</button>
</body>
</html>
