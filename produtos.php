<?php include "./data/produtos.php"?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include "./view/header.php"?>
    <div class="produtos">
<?php foreach ($produtos as $produto): ?> 
        <div class="produto">
            <img src="<?= $produto->imagem ?>" alt="">
            <h2><?= $produto->nome ?></h2>
            <p><?= $produto->descricao ?></p>
           <button class="botao"><a href="/produto.php?id=<?= $produto->id ?>">VER MAIS</a></button>
        </div>
<?php endforeach; ?> 
    </div>
    <?php include "./view/footer.php"?>
</body>

</html>