<?php require "./data/conexao.php";
require "./data/auth.php";
$mensagem_erro = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome= trim($_POST['nome']);
    $email= trim($_POST['email']);
    $senha= trim($_POST['senha']);
    if($nome == '' || $email=='' || $senha ==''){
        $mensagem_erro = 'Preencha todos os campos';
    }
    else{
        $sql = "INSERT INTO usuarios (nome, email, senha) values (?,?,?)";
        $stmt = $conn ->prepare($sql);
        $stmt -> bind_param("sss", $nome, $email, $senha);
        try{
            $stmt->execute();
            exit;
        }catch(mysqli_sql_exception $e){
            $mensagem_erro = $e->getCode()===1062
            ? "Email já cadastrado"
            :'Erro ao cadstrar'
            ;
        }
}}
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <h1>Criar conta</h1>
    <form method="post">
        <label for= "nome">nome</label>
        <input type= "text" name="nome" id="nome">
        <label for= "email">email</label>
        <input type= "email" name="email" id="email">
        <label for= "senha">senha</label>
        <input type= "password" name="senha" id="senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <?php if ($mensagem_erro): ?>
        <p><?= $mensagem_erro?></p>
        <?php endif; ?>
</body>
</html>