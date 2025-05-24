
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anúncio</title>
  <link rel="stylesheet" href="../css/anuncio.css">
</head>
<body>

  <div class="header">
    <header class="bg-green-800 text-white p-4 flex items-center">

    <a href="../view/telaDeAnuncios.php" class="arrow">&#8592;</a>
  </header>

  
    
  <span class = "header-text"> VER-O-ANÚNCIO </span>
  <link rel="stylesheet" href="../css/anuncio.css">
  </div>

  
    <div class="card">
      
      <div class="content">
        <?php  include '../../../backEnd/Controller/carregarAnuncio.php';
?>
        <button class="btn" >Falar com vendedor</button>
      </div>
    </div>

</body>
</html>
