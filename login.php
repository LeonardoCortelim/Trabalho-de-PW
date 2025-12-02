<?php
session_start(); 

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario']; // Armazena o usuário
    $senha = $_POST['senha']; 

    // Valida usuário e senha
    if ($usuario === "admin" && $senha === "123") {
        $_SESSION['logado'] = true; 
        header("Location: index.php"); 
        exit; 
    } else {
        $erro = "Usuário ou senha incorretos!"; 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Tela de Login</h2>

<form method="POST">
    <label>Usuário:</label><br>
    <input type="text" name="usuario" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
</form>

</body>
</html>