<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Anúncio</title>
    <link rel="stylesheet" href="../css/piblicaranuncio.css">
</head>
<body>
 
 <div class="header">
        <h2>Seu anúncio</h2>
    </div>
   
        <form method="post" enctype="multipart/form-data" action="../../../backend/Controller/publicarAnuncioController.php">
             <div class="container">
        <input class="photo" type="file" name="foto" id="foto" accept="image/*" />
        
        </div>
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
                <input type="number" accept="0.01" name="preco" placeholder="Valor" />
            </div>
            <button type="submit">Concluir</button>

        </form>
    </div>
</body>
</html>
