<?php include "./data/produtos.php";
$id = $_GET['id'];

$produtoSelecionado = null;

for($i=0;$id < count($produtos) ;$i++){
    if($produtos [$i]->id == $id){
        $produtoSelecionado = $produtos [$i];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/produto.css">
      <link rel="stylesheet" href="./css/header.css">
      <link rel="stylesheet" href="./css/footer.css">
    <title>
        Lojinha | 
        <?= $produtoSelecionado ? $produtoSelecionado ->nome : "produto não encontrado" ?>
    </title>
</head>

<body>
    <?php include "./view/header.php"?>
    <h2><?= $produtoSelecionado ->nome?></h2>
    <h3><?= $produtoSelecionado ->preco?></h3>
    <h5><?= $produtoSelecionado ->descricao?></h5>
    <h6><?= $produtoSelecionado ->categoria?></h6>
    <h7><?= $produtoSelecionado ->marca?></h7>
    <img src="<?= $produtoSelecionado -> imagem ?>" alt="" class="produto">
     <?php include "./view/footer.php"?>
    
</body>
</html>