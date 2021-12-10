<?php
require_once './database/conexao.php';

$idProduto = $_GET['id'] ?? null;

if (!$_GET['id']) {
    header('location: index.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM produto WHERE id = :id");
$statement->bindValue(':id', $idProduto);
$statement->execute();
$produto = $statement->fetch(PDO::FETCH_ASSOC);

$nome = $produto['nome'];
$desc = $produto['descricao'];
$preco = $produto['preco'];

$erros = [];
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
        $statement = $pdo->prepare("UPDATE produto SET nome = :nome, descricao = :desc, preco = :preco WHERE id = :id");
        $statement->bindValue(':nome', $nome);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':preco', $preco);
        $statement->bindValue(':id', $idProduto);

        $statement->execute();
        header('location: index.php');
    }
}

?>
<?php include_once './partials/header.php' ?>
<div class="container">
    <h1 class="mt-5">Editar Produto</h1>
    <?php include_once './partials/form.php' ?>
</div>
</body>

</html>