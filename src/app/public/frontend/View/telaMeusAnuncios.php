<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meus Anúncios</title>
  <style>
    body {
      background-color: #f2deb0;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .header {
      background-color: #2f5534;
      color: #f2deb0;
      display: flex;
      align-items: center;
      padding: 20px;
      font-size: 28px;
    }

    .back-arrow {
      font-size: 36px;
      margin-right: 20px;
      cursor: pointer;
    }

    .container {
      padding: 30px 20px;
    }

    .card {
      background-color: #2f5534;
      border-radius: 30px;
      padding: 20px;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .left {
      display: flex;
      align-items: center;
    }

    .image-box {
      width: 80px;
      height: 80px;
      background-color: #f2deb0;
      border-radius: 20px;
      margin-right: 20px;
      overflow: hidden;
    }

    .image-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .info {
      color: #f2deb0;
      font-size: 16px;
      line-height: 1.4;
    }

    .info .title {
      font-size: 18px;
      font-weight: bold;
    }

    .info .price {
      margin-top: 4px;
    }

    .date {
      color: #f2deb0;
      font-size: 16px;
    }
    a{
      color: #f2deb0;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="back-arrow"><a href="telaDeAnuncios.php">&#8592;</a></div>
    <div>Meus anuncios</div>
  </div>

  <div class="container">
    <div class="card">
      <div class="left">
        <div class="image-box">
          <img src="https://via.placeholder.com/80" alt="Produto">
        </div>
        <div class="info">
          <div class="title">Produto Exemplo</div>
          <div>Descrição breve do produto</div>
          <div class="price">R$ 0,00</div>
        </div>
      </div>
      <div class="date" id="date1"></div>
    </div>

    <div class="card">
      <div class="left">
        <div class="image-box">
          <img src="https://via.placeholder.com/80" alt="Produto">
        </div>
        <div class="info">
          <div class="title">Produto 2</div>
          <div>Outro item anunciado</div>
          <div class="price">R$ 0,00</div>
        </div>
      </div>
      <div class="date" id="date2"></div>
    </div>
  </div>

  <script>
    // Define data atual
    const hoje = new Date();
    const opcoes = { day: '2-digit', month: '2-digit', year: 'numeric' };
    const dataFormatada = hoje.toLocaleDateString('pt-BR', opcoes);

    // Insere a data no HTML
    document.getElementById('date1').innerText = dataFormatada;
    document.getElementById('date2').innerText = dataFormatada;
  </script>

</body>
</html>
<style>
    @media (max-width: 768px) {
        .header {
            font-size: 24px;
            padding: 15px;
        }

        .back-arrow {
            font-size: 28px;
            margin-right: 15px;
        }

        .container {
            padding: 20px 10px;
        }

        .card {
            flex-direction: column;
            align-items: flex-start;
        }

        .left {
            flex-direction: column;
            align-items: flex-start;
        }

        .image-box {
            width: 60px;
            height: 60px;
            margin-right: 0;
            margin-bottom: 10px;
        }

        .info {
            font-size: 14px;
        }

        .info .title {
            font-size: 16px;
        }

        .date {
            font-size: 14px;
            margin-top: 10px;
        }
    }

    @media (max-width: 480px) {
        .header {
            font-size: 20px;
            padding: 10px;
        }

        .back-arrow {
            font-size: 24px;
            margin-right: 10px;
        }

        .container {
            padding: 15px 5px;
        }

        .card {
            padding: 15px;
        }

        .image-box {
            width: 50px;
            height: 50px;
        }

        .info .title {
            font-size: 14px;
        }

        .info {
            font-size: 12px;
        }

        .date {
            font-size: 12px;
        }
    }
</style>