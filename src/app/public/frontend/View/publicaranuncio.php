
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Anúncio</title>
    <link rel="stylesheet" href="../css/publicaranuncio.css">
</head>
<body>
    <div class="header">
            <a href="../view/telaDeAnuncios.php" class="back">&#8592;</a>

        <h2>SEU ANÚNCIO</h2>
    </div>
    <main>
        <form method="post" enctype="multipart/form-data" action="../../../backend/Controller/publicarAnuncioController.php" class="anuncio-form">
            <div class="photo-area">
                <input class="photo" type="file" name="foto" id="foto" accept="image/*" />
            </div>
            <div class="fields-area">
                <div class="form-group">
                    <label for="titulo">Título do anúncio</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Título" required />
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" placeholder="Descrição" required></textarea>
                </div>
                <div class="form-group">
                    <label for="preco">Valor R$</label>
                    <input type="number" step="0.01" name="preco" id="preco" placeholder="Valor" required />
                </div>
                <button type="submit">Concluir</button>
            </div>
        </form>
    </main>
</body>
</html>