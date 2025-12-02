<?php
require_once "conexao.php"; 

// Verifica se o formulário nao foi enviado
if (!isset($_POST['id'])) {

    $id = $_GET['id']; 
    $usuario = $conn->query("SELECT * FROM usuarios WHERE id=$id")->fetch_assoc(); // Busca os dados do usuário
?>

<h2>Editar Usuário</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>"> 
    <input type="text" name="nome" value="<?= $usuario['nome'] ?>"><br><br>
    <input type="email" name="email" value="<?= $usuario['email'] ?>"><br><br>
    <input type="date" name="data_nascimento" value="<?= $usuario['data_nascimento'] ?>"><br><br>
    <button>Salvar</button>
</form>

<?php
exit(); 
}

//salvamento

$id    = $_POST['id']; 
$nome  = $_POST['nome'];     
$email = $_POST['email']; 
$data  = $_POST['data_nascimento']; 

// Atualiza os dados no banco
$conn->query("UPDATE usuarios 
              SET nome='$nome', email='$email', data_nascimento='$data'
              WHERE id=$id");

header("Location: index.php"); 