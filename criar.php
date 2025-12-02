<?php
require_once "conexao.php";

$nome  = $_POST['nome']; //Pega o nome enviado pelo formulário e guarda na variavel
$email = $_POST['email'];
$data  = $_POST['data_nascimento'];
$senha = $_POST['senha'];

$conn->query("INSERT INTO usuarios (nome, email, data_nascimento, senha)
              VALUES ('$nome', '$email', '$data', '$senha')");

header("Location: index.php");
