<?php
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM produto");
$statement->execute();
$produtos = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Lista de produtos</h1>
        <a href="create.php" class="btn btn-outline-success mt-3">Criar produto</a>
        <ul class="list-group mt-5">
            <?php foreach ($produtos as $i => $produto) : ?>
                <li class="list-group-item">
                    <div class="container">
                        <h4><?php echo $i . ' - ' . $produto['nome'] ?></h4>
                        <span class="badge rounded-pill bg-secondary"><?php echo $produto['preco'] ?></span>
                        <?php if ($produto['descricao']) : ?>
                            <p class="mt-4"><?php echo $produto['descricao'] ?></p>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>