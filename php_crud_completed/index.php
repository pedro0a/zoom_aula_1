<?php
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM produto");
$statement->execute();
$produtos = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include_once './partials/header.php' ?>
<div class="container">
    <h1 class="mt-5">Lista de produtos</h1>
    <a href="create.php" class="btn btn-outline-success mt-3">Criar produto</a>
    <ul class="list-group mt-5">
        <?php foreach ($produtos as $produto) : ?>
            <li class="list-group-item">
                <div class="container">
                    <a href="update.php?id=<?php echo $produto['id'] ?>" style="float: right;" class="btn btn-warning">Editar</a>
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
                        <button type="submit" style="float: right;" class="btn btn-danger">Apagar</button>
                    </form>
                    <h4><?php echo $produto['id'] . ' - ' . $produto['nome'] ?></h4>
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