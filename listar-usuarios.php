<?php require "./data/conexao.php";
require "./data/auth.php";
$sql = 'Select * from usuarios';
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="./css/listar.css">
    <link rel="stylesheet" href="./css/header.css">
  

</head>
<body>
    <?php include "./view/header.php" ?>
      <div class="usuarios">
    <h1>Usuários</h1>
    <button class="botao"><a href="/cadastrar-usuario.php">CRIAR USUÁRIOS</a></button>
    <div class="usuarios">
        <?php while($usuario = $resultado->fetch_object()) :?>
        <div class="usuario">
            <p>Id:<?= $usuario-> id ?></p>
            <p>Email:<?= $usuario-> email ?></p>
            <p>Nome:<?= $usuario-> nome ?></p>
            <p>Senha:<?= $usuario-> senha ?></p>
            <a href="editar-usuario.php?id=<?= $usuario->id?>">Editar</a>
        </div>
        <?php endwhile?>

    </div>
    
</body>
</html>