<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Minha Conta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="css/minhaConta.css" />
</head>
<body class="bg-yellow-100 font-sans">
  <!-- Cabeçalho -->
  <header class="bg-green-800 text-white p-4 flex items-center">
    <a href="#" class="text-2xl mr-4" aria-label="Voltar para página anterior">&#8592;</a>
    <h1 class="text-2xl font-semibold">Minha conta</h1>
  </header>

  <!-- Conteúdo principal -->
  <main class="p-6 max-w-3xl mx-auto bg-white mt-6 rounded-xl shadow-md relative">
    <div id="feedbackMsg" class="hidden absolute top-2 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-4 py-2 rounded shadow z-50"></div>
    
    <button id="editarPerfil" class="absolute right-4 top-4 bg-green-800 text-white px-4 py-2 rounded-lg shadow hover:bg-green-900 transition z-10" aria-label="Editar dados do perfil">Editar</button>
    <button id="salvarPerfil" class="absolute right-4 top-4 bg-yellow-400 text-green-900 px-4 py-2 rounded-lg shadow hover:bg-yellow-500 transition z-10 hidden font-bold border border-green-800" aria-label="Salvar dados do perfil">Salvar</button>
    
    <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
      <!-- Foto de perfil -->
      <div class="flex flex-col items-center">
        <div class="foto-perfil-container">
          <img id="fotoPerfil" src="https://via.placeholder.com/150" alt="Foto do usuário" class="foto-perfil-img" />
          <input type="file" id="inputFoto" accept="image/*" class="hidden" />
          <div id="botoesFoto" class="botoes-foto">
            <button id="btnFoto" class="botao-foto verde" aria-label="Alterar foto de perfil">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6-6" /></svg>
              Alterar
            </button>
            <button id="btnRemoverFoto" class="botao-foto vermelho" aria-label="Remover foto de perfil">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
              Remover
            </button>
          </div>
        </div>
        <span id="nomeCentralizado" class="nome-centralizado">---</span>
      </div>

      <!-- Informações da conta -->
      <form id="formPerfil" class="text-gray-800 text-lg space-y-4 w-full">
        <div class="flex items-center">
          <label for="inputNome" class="label">Nome</label>
          <span class="campo editavel" id="inputNome">---</span>
        </div>
        <div class="flex items-center">
          <label for="inputEmail" class="label">Email</label>
          <span class="campo editavel" id="inputEmail">---</span>
        </div>
        <div class="flex items-center">
          <label for="inputCPF" class="label">CPF</label>
          <span class="campo editavel" id="inputCPF">000.000.000-00</span>
        </div>
        <div class="flex items-center">
          <label for="inputTelefone" class="label">Telefone</label>
          <span class="campo editavel" id="inputTelefone">(00) 00000-0000</span>
        </div>
      </form>
    </div>
  </main>

  <?php require "../../../backend/Controller/infoUserController.php"; ?>
  <script src="../js/minhconta.js"></script>
</body>
</html>
