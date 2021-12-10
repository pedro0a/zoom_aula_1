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
        $statement = $pdo->prepare("INSERT INTO produto(nome, descricao, preco) VALUES (:nome, :desc, :preco);");

        $statement->bindValue(':nome', $nome);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':preco', $preco);

        $statement->execute();
    }
}

?>
<?php include_once './partials/header.php' ?>
<div class="container">
    <h1 class="mt-5">Criar Produto</h1>

    <?php include_once './partials/form.php' ?>
</div>
</body>

</html>