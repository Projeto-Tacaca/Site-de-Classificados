
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anúncio</title>
  <link rel="stylesheet" href="../css/style.css">
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
      <div class="image-box">
        <img src="https://via.placeholder.com/250x200?text=foto" alt="foto do serviço">
        <span class="star">&#9733;</span>
      </div>

      <div class="content">
        <?php  include '../../../backEnd/Controller/carregarAnuncio.php';
?>
        <p class="address">endereço</p>
        <button class="btn" >Falar com vendedor</button>
      </div>
    </div>

</body>
</html>
