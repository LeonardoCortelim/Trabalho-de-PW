<?php
$host = "localhost"; // Onde está rodando o servidor MySQL
$user = "root"; 
$pass = "123";
$db   = "pw";

$conn = new mysqli($host, $user, $pass, $db); // Cria objeto de conexão ($conn)

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error); // Se houver erro, para tudo e mostra
}
?>