<link rel="stylesheet" href="style.css">

<?php
session_start(); 
require_once "conexao.php"; 

$USER = "admin"; 
$PASS = "123"; 

if (isset($_GET['logout'])) { //clicou no botão de sair
    session_destroy();
    header("Location: index.php");
}

if (isset($_POST['login_user'])) {
    if ($_POST['login_user'] == $USER && $_POST['login_pass'] == $PASS) { //validação de nome e senha (admin e 123).
        $_SESSION['logged'] = true;
    } else {
        $erro_login = "Usuário ou senha incorretos!"; 
    }
}

if (!isset($_SESSION['logged'])) { //verifica se não está logado
?>
<h2>Login</h2>

<form method="POST">
    <input type="text" name="login_user" placeholder="Usuário"><br>
    <input type="password" name="login_pass" placeholder="Senha"><br>
    <button>Entrar</button>
</form>

<?php
exit(); 
}
?>

<h2>Sistema CRUD</h2>

<a href="?logout=1">Sair</a> 

<h3>Cadastrar Usuário</h3>

<!-- form enviado para criar.php -->
<form method="POST" action="criar.php">
    <input type="text" name="nome" placeholder="Nome" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="date" name="data_nascimento" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <button>Cadastrar</button>
</form>

<h3>Lista de Usuários</h3>

<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Nascimento</th>
    <th>Ações</th>
</tr>

<?php
$lista = $conn->query("SELECT * FROM usuarios"); 
while ($u = $lista->fetch_assoc()): // Loop para cada usuário criar uma linha
?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['nome'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= $u['data_nascimento'] ?></td>
    <td>
        <!-- envia ID pela URL -->
        <a href="editar.php?id=<?= $u['id'] ?>">Editar</a> |
        
        <!-- Confirmação para excluir-->
        <a href="excluir.php?id=<?= $u['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</table>