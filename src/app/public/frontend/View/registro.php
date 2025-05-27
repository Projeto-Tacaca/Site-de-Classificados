<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/cadastor.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro</title>
  
</head>
<body>
  <div class="container">

    <div class="form-box">

     <form action="../../../backend/Controller/registroController.php" method="post">
       <h1>CRIE SUA CONTA</h1>

      <div style="margin-left: 10px;">

        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="tel" name="telefone" placeholder="Telefone" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="password" name="confirmSenha" placeholder="Confirmar senha" required>
        <button type="submit">Concluir</button>

      </div>
     </form>
    </div>
    <div class="logo-area">
      <img src="../../images/imagem_2025-05-03_155311002-removebg-preview - Copia.png" alt="Logo">
      <h2>
        <span>VER-O-</span>
        <span>ANÚNCIO</span>
      </h2>
    </div>
  </div>
</body>
</html>