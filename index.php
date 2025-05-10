<?php
// Caminho base dinâmico
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

// Redireciona para a tela de login
header("Location: $base/src/app/public/frontend/View/login.php");
exit;
?>
