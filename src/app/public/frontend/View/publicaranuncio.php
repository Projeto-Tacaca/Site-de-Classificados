<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Anúncio</title>
    <link rel="stylesheet" href="../css/piblicaranuncio.css">
</head>
<body>

 <?php  include '../../../backEnd/Controller/publicarAnuncioController.php';?>  
 
 <div class="header">
        <h2>Seu anúncio</h2>
    </div>
    <div class="container">
        <div class="photo">foto</div>
        <div class="indicator">
            <div class="active"></div>
            <div></div>
            <div></div>
        </div>
        <form method="post" enctype="multipart/form-data" action="../../../backend/Controller/publicarAnuncioController.php">
            <div class="form-group">
                <label>Título do anúncio</label>
                <input type="text" name="titulo" placeholder="Título" />
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="descricao" placeholder="Descrição"></textarea>
            </div>
            <div class="form-group">
                <label>Valor R$</label>
                <input name="preco" type="text" placeholder="Valor" />
            </div>
            <button type="submit">Concluir</button>
        </form>
    </div>
</body>
</html>
