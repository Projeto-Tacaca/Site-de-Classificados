<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meus Anúncios</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/anuncio.css" />
</head>
<body>
  <header class="header">
    <a href="../view/telaDeAnuncios.php" class="back">&#8592;</a>
    <h1 class="titulo">Meus anúncios</h1>
  </header>
  <section class="container" style="max-width: 600px; margin-top: 24px;">
    <h2 class="titulo-menor" style="color: #2e5c3e; margin-bottom: 12px;">
      <?php echo $anuncioEditar ? 'Editar Anúncio' : 'Novo Anúncio'; ?>
    </h2>
    <form id="form-anuncio" class="form-perfil" method="post" enctype="multipart/form-data" style="background: #fffbe9; border-radius: 16px; box-shadow: 0 2px 8px rgba(46,92,62,0.08); padding: 24px; gap: 16px; display: flex; flex-direction: column;">
      <input type="hidden" name="acao" value="<?php echo $anuncioEditar ? 'editar' : 'adicionar'; ?>">
      <?php if ($anuncioEditar): ?>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($anuncioEditar['id']); ?>">
      <?php endif; ?>
      <input type="text" id="titulo" name="titulo" placeholder="Título" required class="campo" value="<?php echo htmlspecialchars($anuncioEditar['titulo'] ?? ''); ?>" />
      <input type="text" id="preco" name="preco" placeholder="Preço (R$)" required class="campo" value="<?php echo isset($anuncioEditar['preco']) ? preg_replace('/^R\$\s?/', '', $anuncioEditar['preco']) : ''; ?>" />
      <textarea id="descricao" name="descricao" placeholder="Descrição do anúncio" required class="campo" style="min-height: 80px;"><?php echo htmlspecialchars($anuncioEditar['descricao'] ?? ''); ?></textarea>
      <input type="file" id="imagemUpload" name="imagemUpload" class="campo" accept="image/*" />
      <div style="display: flex; gap: 10px; align-items: center;">
        <button type="submit" class="btn-salvar">
          <?php echo $anuncioEditar ? 'Salvar Alterações' : 'Adicionar Anúncio'; ?>
        </button>
        <?php if ($anuncioEditar): ?>
          <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn-editar" style="background: #fdf1c1; color: #2e5c3e; border: 1px solid #2e5c3e;">Cancelar Edição</a>
        <?php endif; ?>
      </div>
    </form>
  </section>
  <main id="anuncios-lista" class="container" style="max-width: 700px; margin-top: 32px;">
    <?php if (empty($_SESSION['anuncios'])): ?>
      <div id="mensagem-vazia" aria-live="polite" style="display: flex; justify-content: center; align-items: center; margin-top: 48px;">
        <div style="width: 220px; background: #fffbe9; border: 2px solid #f0b340; border-radius: 16px; padding: 24px; text-align: center; box-shadow: 0 2px 8px rgba(46,92,62,0.08);">
          <div style="margin-bottom: 18px; font-size: 2.5rem; color: #f0b340;">&#128712;</div>
          <div style="height: 10px; background: #f0b340; border-radius: 4px; width: 80%; margin: 0 auto 8px auto;"></div>
          <div style="height: 10px; background: #f0b340; border-radius: 4px; width: 70%; margin: 0 auto 8px auto;"></div>
          <div style="height: 10px; background: #f0b340; border-radius: 4px; width: 90%; margin: 0 auto 16px auto;"></div>
          <div style="height: 18px; width: 60%; background: #fdf1c1; border-radius: 8px; margin: 0 auto;"></div>
          <p style="margin-top: 18px; color: #2e5c3e; font-weight: 600;">Você ainda não tem anúncios publicados</p>
        </div>
      </div>
    <?php else: ?>
      <?php foreach (array_reverse($_SESSION['anuncios']) as $anuncio): ?>
        <div class="anuncio" style="background: #2e5c3e; color: #fffbe9; border-radius: 20px; padding: 18px 20px; margin-bottom: 18px; display: flex; flex-direction: column; gap: 10px; box-shadow: 0 2px 8px rgba(46,92,62,0.10);">
          <div style="display: flex; align-items: center; gap: 18px;">
            <div style="width: 70px; height: 70px; border-radius: 12px; background: #fffbe9; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 2px solid #f0b340;">
              <img src="<?php echo htmlspecialchars($anuncio['imagem']); ?>" alt="Imagem do anúncio: <?php echo htmlspecialchars($anuncio['titulo']); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;"/>
            </div>
            <div style="flex: 1;">
              <div style="font-size: 1.1rem; font-weight: 600; color: #fffbe9;"><?php echo htmlspecialchars($anuncio['titulo']); ?></div>
              <div style="color: #f0b340; font-weight: bold;"><?php echo htmlspecialchars($anuncio['preco']); ?></div>
            </div>
          </div>
          <p style="font-size: 1rem; color: #fffbe9; margin: 6px 0 0 0;"><?php echo htmlspecialchars($anuncio['descricao']); ?></p>
          <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px; gap: 10px;">
            <div style="font-size: 0.9rem; color: #f0b340; display: flex; align-items: center; gap: 4px;">
              <span style="font-size: 1.1em;">&#128197;</span>
              <?php echo htmlspecialchars($anuncio['data']); ?>
            </div>
            <div style="display: flex; gap: 10px;">
              <a href="?editar=<?php echo urlencode($anuncio['id']); ?>" style="font-size: 0.95rem; color: #fdf1c1; background: #f0b340; border-radius: 8px; padding: 4px 12px; text-decoration: none; font-weight: 600; transition: background 0.2s;">Editar</a>
              <a href="?excluir=<?php echo urlencode($anuncio['id']); ?>" style="font-size: 0.95rem; color: #fffbe9; background: #dc2626; border-radius: 8px; padding: 4px 12px; text-decoration: none; font-weight: 600; transition: background 0.2s;" onclick="return confirm('Tem certeza que deseja excluir este anúncio?');">Excluir</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </main>
  <style>
    #anuncios-lista::-webkit-scrollbar {
      height: 8px;
      background: #f2deb0;
    }
    #anuncios-lista::-webkit-scrollbar-thumb {
      background: #2f5534;
      border-radius: 8px;
    }
    #anuncios-lista {
      scrollbar-width: thin;
      scrollbar-color: #2f5534 #f2deb0;
    }
    @media (max-width: 600px) {
      .container { padding: 10px !important; }
      .anuncio { padding: 10px 6px !important; }
    }
  </style>
</body>
</html>