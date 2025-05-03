<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ver-o-Anúncio</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fdf1c1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            background-color: #fdf1c1;
            padding: 20px;
        }

        .login-box {
            background-color: #2e5c3e;
            padding: 30px;
            border-radius: 25px;
            color: #fdf1c1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .login-box h1 {
            margin: 0;
            font-size: 24px;
        }

        .login-box input {
            padding: 10px;
            border: none;
            border-radius: 10px;
            background-color: #fdf1c1;
            color: #2e5c3e;
            font-size: 16px;
        }

        .login-box button {
            background-color: #f0b340;
            color: #2e5c3e;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-box a {
            color: #fdf1c1;
            font-size: 14px;
            text-decoration: none;
            text-align: center;
        }

        .logo-box {
            display: flex;
            align-items: center;
            margin-left: 40px;
        }

        .logo-box img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .logo-box span {
            font-size: 28px;
            color: #2e5c3e;
            font-weight: bold;
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>Faça seu login</h1>
            <input type="email" placeholder="E-mail">
            <input type="password" placeholder="Senha">
            <button>Concluir</button>
            <a href="#">Esqueci minha senha</a>
        </div>
        <div class="logo-box">
            <img src="IMG-20250502-WA0001.webp" alt="Logo">
            <span>VER-O-<br>ANÚNCIO</span>
        </div>
    </div>
</body>
</html>