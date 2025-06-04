<?php 
session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['id_user'])) {
    header("Location: ../view/telaDeAnuncios.php");
    exit();

}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Minha Conta</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <!-- Cabeçalho -->
  <header class="header">
    <a href="../view/telaDeAnuncios.php" class="back" aria-label="Voltar para página anterior">&#8592;</a>
    <h1 class="titulo">MINHA CONTA</h1>
  </header>

  <!-- Conteúdo principal -->
  <main class="container perfil-container">
    <button id="editarPerfil" class="btn-editar" aria-label="Editar dados do perfil" onclick="toggleEditarPerfilTexto(this)">Editar</button>
   
    <div class="perfil-flex">
      <!-- Foto de perfil -->
      <div class="foto-perfil-container">
        <img id="fotoPerfil" src="" alt="Foto do usuário" class="foto-perfil-img" />
        <input type="file" id="inputFoto" accept="image/*" class="hidden" />
        <div id="botoesFoto" class="botoes-foto">



          <button id="btnFoto" class="botao-foto verde" aria-label="Alterar foto de perfil">
             Alterar
          </button>
          <button id="btnRemoverFoto" class="botao-foto vermelho" aria-label="Remover foto de perfil">
             Remover
          </button>
        
        
        
        </div>
      </div>
      <!-- função de arredondamento de foto de perfil -->
      <div class="perfil-info">
        <span id="nomeCentralizado" class="nome-centralizado">---</span>
        <!-- Informações da conta -->
        <form id="formPerfil" class="form-perfil">
          <div class="campo-linha">
            <label for="inputNome" class="label">Nome</label>
            <span class="campo editavel" id="inputNome">---</span>
          </div>
          <div class="campo-linha">
            <label for="inputEmail" class="label">Email</label>
            <span class="campo editavel" id="inputEmail">---</span>
          </div>
          <div class="campo-linha">
            <label for="inputTelefone" class="label">Telefone</label>
            <span class="campo editavel" id="inputTelefone">(00) 00000-0000</span>
          </div>
        </form>
      </div>
    </div>
  </main>

  <?php require "../../../backend/Controller/infoUserController.php"; ?>
  <script src="../js/minhconta.js"></script>
</body>
</html>
