<?php 
    require "./data/conexao.php";
    require "./data/auth.php";
    $id= $_GET["id"]?? 0;
    if($_SERVER["REQUEST_METHOD"]=== "POST"){
        $nome= $_POST["nome"];
        $email= $_POST["email"];
        $senha= $_POST["senha"];
        if($nome=== ""|| $email=== ""|| $senha=== ""){
            $mensagem_erro= "preencha todos os campos";
    }else{
        $sql = "UPDATE usuarios SET nome = '$nome', senha='$senha', email= '$email' WHERE id= $id";
        $conn->query($sql);
        header("Location: listar-usuários.php");
        }
    }
    $sql = "SELECT * from usuarios where id=$id";
    $resultado = $conn->query($sql);
    $usuario = $resultado->fetch_object();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link rel="stylesheet" href="./css/editar.css">
</head>
<body>
    <h1>Editar usuário</h1>
    <form method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?=$usuario->nome?>" required/>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?=$usuario->email?>" required/>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" value="<?=$usuario->senha?>" required/>
        <button type="submit">Editar</button>
        <a href="excluir-usuario.php?id=<?=$usuario->id?>">Excluir</a>
    </form>
    
</body>
</html>