<?php
session_start();
require_once "conexao.php";

// LOGIN ESTÁTICO
$USER = "admin";
$PASS = "123";

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
}

if (isset($_POST['login_user'])) {
    if ($_POST['login_user'] == $USER && $_POST['login_pass'] == $PASS) {
        $_SESSION['logged'] = true;
    } else {
        $erro_login = "Usuário ou senha incorretos!";
    }
}

if (!isset($_SESSION['logged'])) {
?>
<!-- FORMULÁRIO DE LOGIN -->
 
<h2>Login</h2>
<form method="POST">
    <input type="text" name="login_user" placeholder="Usuário"><br><br>
    <input type="password" name="login_pass" placeholder="Senha"><br><br>
    <button>Entrar</button>
</form>
<p style="color:red;"><?= $erro_login ?? '' ?></p>
<?php
exit();
}
?>

<h2>Sistema CRUD</h2>
<a href="?logout=1">Sair</a>

<h3>Cadastrar Usuário</h3>
<form method="POST" action="criar.php">
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="date" name="data_nascimento" required><br><br>
    <input type="password" name="senha" placeholder="Senha" required><br><br>
    <button>Cadastrar</button>
</form>

<h3>Lista de Usuários</h3>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Nascimento</th>
    <th>Ações</th>
</tr>

<?php
$lista = $conn->query("SELECT * FROM usuarios");
while ($u = $lista->fetch_assoc()):
?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['nome'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= $u['data_nascimento'] ?></td>

    <td>
        <a href="editar.php?id=<?= $u['id'] ?>">Editar</a> | 
        <a href="excluir.php?id=<?= $u['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
