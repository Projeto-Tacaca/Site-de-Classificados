<?php
session_start();
if (!isset($_SESSION['anuncios'])) {
    $_SESSION['anuncios'] = [];
}

// Função para gerar um ID único simples
function gerarId() {
    return uniqid();
}

// Adicionar anúncio
if (isset($_POST['acao']) && $_POST['acao'] === 'adicionar') {
    $titulo = trim($_POST['titulo'] ?? '');
    $preco = trim($_POST['preco'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $data = date('d/m/Y');
    $imagem = '';
    if (isset($_FILES['imagemUpload']) && $_FILES['imagemUpload']['error'] === UPLOAD_ERR_OK) {
        $tmp = $_FILES['imagemUpload']['tmp_name'];
        $nome = uniqid('img_') . '.' . pathinfo($_FILES['imagemUpload']['name'], PATHINFO_EXTENSION);
        $uploadDir = __DIR__ . '/uploads';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $destino = 'uploads/' . $nome;
        move_uploaded_file($tmp, $uploadDir . '/' . $nome);
        $imagem = $destino;
    }
    if ($titulo && $preco && $descricao) {
        $_SESSION['anuncios'][] = [
            'id' => gerarId(),
            'titulo' => $titulo,
            'preco' => (strpos($preco, 'R$') === 0 ? $preco : 'R$ ' . $preco),
            'descricao' => $descricao,
            'imagem' => $imagem ?: 'https://via.placeholder.com/60',
            'data' => $data
        ];
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Excluir anúncio
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $_SESSION['anuncios'] = array_filter($_SESSION['anuncios'], function($a) use ($id) {
        return $a['id'] !== $id;
    });
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Editar anúncio (carregar dados)
$anuncioEditar = null;
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    foreach ($_SESSION['anuncios'] as $a) {
        if ($a['id'] === $id) {
            $anuncioEditar = $a;
            break;
        }
    }
}
// Salvar edição
if (isset($_POST['acao']) && $_POST['acao'] === 'editar' && isset($_POST['id'])) {
    foreach ($_SESSION['anuncios'] as &$a) {
        if ($a['id'] === $_POST['id']) {
            $a['titulo'] = trim($_POST['titulo'] ?? '');
            $a['preco'] = (strpos($_POST['preco'], 'R$') === 0 ? $_POST['preco'] : 'R$ ' . $_POST['preco']);
            $a['descricao'] = trim($_POST['descricao'] ?? '');
            if (isset($_FILES['imagemUpload']) && $_FILES['imagemUpload']['error'] === UPLOAD_ERR_OK) {
                $tmp = $_FILES['imagemUpload']['tmp_name'];
                $uploadDir = __DIR__ . '/uploads';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $destino = 'uploads/' . $nome;
                move_uploaded_file($tmp, $uploadDir . '/' . $nome);
                $a['imagem'] = $destino;
                $a['imagem'] = $destino;
            }
            break;
        }
    }
    unset($a);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meus Anúncios</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-100 font-sans min-h-screen">
  <header class="bg-green-800 text-white p-4 flex items-center">
    <a href="#" class="text-2xl mr-4">&#8592;</a>
    <h1 class="text-2xl font-semibold">Meus anúncios</h1>
  </header>
  <section class="p-4 max-w-2xl mx-auto">
    <h2 class="text-lg font-semibold text-green-900 mb-2"><?php echo $anuncioEditar ? 'Editar Anúncio' : 'Novo Anúncio'; ?></h2>
    <form id="form-anuncio" class="space-y-4 bg-white p-4 rounded-xl shadow" method="post" enctype="multipart/form-data">
      <input type="hidden" name="acao" value="<?php echo $anuncioEditar ? 'editar' : 'adicionar'; ?>">
      <?php if ($anuncioEditar): ?>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($anuncioEditar['id']); ?>">
      <?php endif; ?>
      <input type="text" id="titulo" name="titulo" placeholder="Título" required class="w-full p-2 border rounded" value="<?php echo htmlspecialchars($anuncioEditar['titulo'] ?? ''); ?>" />
      <input type="text" id="preco" name="preco" placeholder="Preço (R$)" required class="w-full p-2 border rounded" value="<?php echo isset($anuncioEditar['preco']) ? preg_replace('/^R\$\s?/', '', $anuncioEditar['preco']) : ''; ?>" />
      <textarea id="descricao" name="descricao" placeholder="Descrição do anúncio" required class="w-full p-2 border rounded"><?php echo htmlspecialchars($anuncioEditar['descricao'] ?? ''); ?></textarea>
      <input type="file" id="imagemUpload" name="imagemUpload" class="w-full p-2 border rounded" accept="image/*" />
      <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
        <?php echo $anuncioEditar ? 'Salvar Alterações' : 'Adicionar Anúncio'; ?>
      </button>
      <?php if ($anuncioEditar): ?>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-500 transition ml-2">Cancelar Edição</a>
      <?php endif; ?>
    </form>
  </section>
  <main id="anuncios-lista" class="p-4 space-y-4 max-w-2xl mx-auto">
    <?php if (empty($_SESSION['anuncios'])): ?>
      <div id="mensagem-vazia" aria-live="polite" class="flex justify-center items-center mt-12">
        <div class="w-56 bg-white border-2 border-slate-300 rounded-xl p-6 text-center shadow-sm">
          <div class="mb-6 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 stroke-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12L12 3l9 9" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 21V12h6v9" />
            </svg>
          </div>
          <div class="space-y-2 mb-4">
            <div class="h-2.5 bg-slate-300 rounded w-4/5 mx-auto"></div>
            <div class="h-2.5 bg-slate-300 rounded w-3/4 mx-auto"></div>
            <div class="h-2.5 bg-slate-300 rounded w-5/6 mx-auto"></div>
          </div>
          <div class="h-6 w-1/2 bg-slate-200 rounded-full mx-auto"></div>
          <p class="mt-4 text-slate-500 font-semibold">Você ainda não tem anúncios publicados</p>
        </div>
      </div>
    <?php else: ?>
      <?php foreach (array_reverse($_SESSION['anuncios']) as $anuncio): ?>
        <div class="bg-green-800 text-yellow-100 rounded-2xl p-4 flex flex-col gap-2 shadow-md hover:shadow-xl transition duration-200">
          <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-lg bg-white flex items-center justify-center overflow-hidden border-2 border-green-900">
              <img src="<?php echo htmlspecialchars($anuncio['imagem']); ?>" alt="Imagem do anúncio: <?php echo htmlspecialchars($anuncio['titulo']); ?>" class="w-full h-full object-cover"/>
            </div>
            <div>
              <div class="text-lg font-semibold text-yellow-50"><?php echo htmlspecialchars($anuncio['titulo']); ?></div>
              <div class="text-green-200 font-bold"><?php echo htmlspecialchars($anuncio['preco']); ?></div>
            </div>
          </div>
          <p class="text-sm mt-1 text-yellow-200"><?php echo htmlspecialchars($anuncio['descricao']); ?></p>
          <div class="flex justify-between items-center mt-2 gap-2">
            <div class="text-xs text-green-200 flex items-center gap-1">
              <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/></svg>
              <?php echo htmlspecialchars($anuncio['data']); ?>
            </div>
            <div class="flex gap-2">
              <a href="?editar=<?php echo urlencode($anuncio['id']); ?>" class="text-xs text-blue-300 hover:text-blue-500 font-semibold transition">Editar</a>
              <a href="?excluir=<?php echo urlencode($anuncio['id']); ?>" class="text-xs text-red-300 hover:text-red-500 font-semibold transition" onclick="return confirm('Tem certeza que deseja excluir este anúncio?');">Excluir</a>
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
    @media (max-width: 500px) {
      #anuncios-lista > div {
        padding: 10px !important;
      }
    }
  </style>
</body>
</html>