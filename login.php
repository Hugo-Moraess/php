<?php
session_start();
require "./data/conexao.php";
$mensagem_erro = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    $sql = "SELECT * FROM usuarios WHERE email = ? and senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_object();
    if ($usuario) {
        $_SESSION["usuario_nome"] = $usuario->nome;
        header("Location: /produtos.php");
        exit;
    } else {
        $mensagem_erro = "Credenciais invalidas";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form method="POST">
        <input placeholder="Digite seu email" type="email" id="email" name="email" required>
        <input placeholder="Digite sua senha" type="password" id="senha" name="senha" required>
        <button type="submit">Entrar</button>
    </form>
    <?php if ($mensagem_erro): ?>
        <p><?= $mensagem_erro ?></p>
    <?php endif; ?>
</body>

</html>