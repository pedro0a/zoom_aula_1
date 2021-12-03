<?php
require_once './database/conexao.php';

$erros = [];
$nome = '';
$desc = '';
$preco = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];
    $preco = $_POST['preco'];

    if (!$nome) {
        $erros[] = 'O nome é obrigatorio!';
    }

    if (!$preco) {
        $erros[] = 'O preco é obrigatorio!';
    }

    if (empty($erros)) {

        $statement = $pdo->prepare("INSERT INTO produto(nome, descricao, preco)
            VALUES(:nome, :desc, :preco)");

        $statement->bindValue(':nome', $nome);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':preco', $preco);

        $statement->execute();
    }
}
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
        <h1 class="mt-5">Criar produto</h1>

        <?php if (!empty($erros)) : ?>
            <div class="alert alert-danger">
                <?php foreach ($erros as $erro) : ?>
                    <div><?php echo $erro ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <a href="index.php" class="btn btn-outline-success mt-3">Lista de produto</a>

        <form class="mt-5" action="create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descricao</label>
                <textarea class="form-control" name="desc"><?php echo $desc ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Preco</label>
                <input type="number" step=".2" class="form-control" name="preco" value="<?php echo $preco ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cria produto</button>
        </form>

    </div>
</body>

</html>